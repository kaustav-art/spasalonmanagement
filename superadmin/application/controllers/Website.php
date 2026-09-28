<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Website CMS Controller - Super Admin Control Panel
 * Manage the commercial product landing page (http://localhost/spasalonmanagement/)
 * Includes Hero Background Image + Live Preview, Logo, Favicon, SEO & Social Media
 */
class Website extends Superadmin_Controller {

    public function index() {
        if ($this->input->method() === 'post') {
            $active_tab = $this->input->post('active_tab', TRUE);
            if (!$active_tab) $active_tab = 'hero';

            $theme_action = $this->input->post('theme_action', TRUE);

            $root_dir = realpath(FCPATH . '../') ? realpath(FCPATH . '../') . DIRECTORY_SEPARATOR : dirname(FCPATH) . DIRECTORY_SEPARATOR;
            $upload_dir = $root_dir . 'uploads' . DIRECTORY_SEPARATOR . 'branding' . DIRECTORY_SEPARATOR;
            $templates_upload_dir = $root_dir . 'uploads' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;

            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0755, true);
            }
            if (!is_dir($templates_upload_dir)) {
                @mkdir($templates_upload_dir, 0755, true);
            }

            // Handle Multi-Theme Architecture Actions
            if ($active_tab === 'themes' && !empty($theme_action)) {
                if ($theme_action === 'save_template') {
                    $template_id = (int)$this->input->post('template_id');
                    $tpl_key = strtolower(trim(preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('template_key'))));
                    if (!$tpl_key) $tpl_key = 'template_' . time();
                    
                    $features_raw = trim($this->input->post('features'));
                    $features_arr = array();
                    if ($features_raw !== '') {
                        $lines = preg_split('/\r\n|\r|\n|,/', $features_raw);
                        foreach ($lines as $ln) {
                            $ln = trim($ln);
                            if ($ln !== '') $features_arr[] = $ln;
                        }
                    }

                    $tpl_data = array(
                        'template_key' => $tpl_key,
                        'name' => trim($this->input->post('name')),
                        'badge' => trim($this->input->post('badge')),
                        'icon' => trim($this->input->post('icon', TRUE)) ?: 'fa-solid fa-crown',
                        'short_desc' => trim($this->input->post('short_desc')),
                        'features' => !empty($features_arr) ? json_encode($features_arr) : NULL,
                        'demo_url' => trim($this->input->post('demo_url')),
                        'sort_order' => (int)$this->input->post('sort_order', TRUE) ?: 1,
                        'status' => $this->input->post('status') === 'inactive' ? 'inactive' : 'active'
                    );

                    if ($template_id > 0) {
                        $this->db->where('id', $template_id)->update('marketplace_templates', $tpl_data);
                        $this->session->set_flashdata('success', 'Template updated successfully!');
                    } else {
                        $this->db->insert('marketplace_templates', $tpl_data);
                        $template_id = $this->db->insert_id();

                        // Automatically initialize Layout 1 with fallback image
                        $this->db->insert('marketplace_template_layouts', array(
                            'template_id' => $template_id,
                            'template_key' => $tpl_key,
                            'layout_number' => 1,
                            'layout_name' => 'Layout 1: ' . $tpl_data['name'],
                            'preview_image' => 'uploads/no-image.jpg',
                            'demo_url' => 'website/?preview_tpl=' . $tpl_key . '&preview_layout=1',
                            'sort_order' => 1,
                            'status' => 'active'
                        ));
                        $this->session->set_flashdata('success', 'Template created successfully with Layout 1!');
                    }
                    redirect(superadmin_url('website?tab=themes'));
                    return;
                }

                if ($theme_action === 'delete_template') {
                    $template_id = (int)$this->input->post('template_id');
                    if ($template_id > 0) {
                        $this->db->where('template_id', $template_id)->delete('marketplace_template_layouts');
                        $this->db->where('id', $template_id)->delete('marketplace_templates');
                        $this->session->set_flashdata('success', 'Template and all its layouts deleted successfully.');
                    }
                    redirect(superadmin_url('website?tab=themes'));
                    return;
                }

                if ($theme_action === 'save_layout') {
                    $layout_id = (int)$this->input->post('layout_id');
                    $template_id = (int)$this->input->post('template_id');
                    $parent_tpl = $this->db->where('id', $template_id)->get('marketplace_templates')->row();
                    $tpl_key = $parent_tpl ? $parent_tpl->template_key : 'template1';

                    $preview_image = trim($this->input->post('preview_image_url'));

                    // Handle Layout Preview Image File Upload
                    if (!empty($_FILES['layout_preview_file']['name']) && $_FILES['layout_preview_file']['error'] === UPLOAD_ERR_OK) {
                        $ext = strtolower(pathinfo($_FILES['layout_preview_file']['name'], PATHINFO_EXTENSION));
                        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'svg', 'webp');
                        if (in_array($ext, $allowed)) {
                            $new_name = 'layout_' . $tpl_key . '_' . time() . '_' . rand(100, 999) . '.' . $ext;
                            $target_path = $templates_upload_dir . $new_name;
                            if (move_uploaded_file($_FILES['layout_preview_file']['tmp_name'], $target_path)) {
                                $preview_image = 'uploads/templates/' . $new_name;
                            }
                        }
                    }

                    // Fallback to default image if empty or not provided
                    if (empty($preview_image)) {
                        $preview_image = 'uploads/no-image.jpg';
                    }

                    $layout_number = (int)$this->input->post('layout_number') ?: 1;
                    $layout_name = trim($this->input->post('layout_name')) ?: ('Layout ' . $layout_number);
                    $demo_url = trim($this->input->post('demo_url')) ?: ('website/?preview_tpl=' . $tpl_key . '&preview_layout=' . $layout_number);

                    $layout_data = array(
                        'template_id' => $template_id,
                        'template_key' => $tpl_key,
                        'layout_number' => $layout_number,
                        'layout_name' => $layout_name,
                        'preview_image' => $preview_image,
                        'demo_url' => $demo_url,
                        'sort_order' => (int)$this->input->post('sort_order') ?: $layout_number,
                        'status' => $this->input->post('status') === 'inactive' ? 'inactive' : 'active'
                    );

                    if ($layout_id > 0) {
                        $this->db->where('id', $layout_id)->update('marketplace_template_layouts', $layout_data);
                        $this->session->set_flashdata('success', 'Layout updated successfully!');
                    } else {
                        $this->db->insert('marketplace_template_layouts', $layout_data);
                        $this->session->set_flashdata('success', 'Layout added successfully!');
                    }
                    redirect(superadmin_url('website?tab=themes'));
                    return;
                }

                if ($theme_action === 'delete_layout') {
                    $layout_id = (int)$this->input->post('layout_id');
                    if ($layout_id > 0) {
                        $this->db->where('id', $layout_id)->delete('marketplace_template_layouts');
                        $this->session->set_flashdata('success', 'Layout deleted successfully.');
                    }
                    redirect(superadmin_url('website?tab=themes'));
                    return;
                }

                if ($theme_action === 'save_theme_section') {
                    $badge = trim($this->input->post('landing_templates_badge'));
                    $title = trim($this->input->post('landing_templates_title'));
                    $subtitle = trim($this->input->post('landing_templates_subtitle'));

                    if ($badge !== '') set_setting('landing_templates_badge', $badge, 'landing');
                    if ($title !== '') set_setting('landing_templates_title', $title, 'landing');
                    if ($subtitle !== '') set_setting('landing_templates_subtitle', $subtitle, 'landing');

                    $this->session->set_flashdata('success', 'Multi-Theme Architecture headers updated successfully!');
                    redirect(superadmin_url('website?tab=themes'));
                    return;
                }
            }

            // Handle File Uploads (Hero BG, Logo, Favicon)
            $uploaded_files = array(
                'landing_hero_bg_file' => 'landing_hero_bg_image',
                'landing_site_logo_file' => 'landing_site_logo',
                'landing_site_favicon_file' => 'landing_site_favicon',
            );

            $uploaded_keys = array();
            foreach ($uploaded_files as $file_input => $setting_key) {
                if (!empty($_FILES[$file_input]['name']) && $_FILES[$file_input]['error'] === UPLOAD_ERR_OK) {
                    $ext = strtolower(pathinfo($_FILES[$file_input]['name'], PATHINFO_EXTENSION));
                    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico');
                    if (in_array($ext, $allowed)) {
                        $new_name = $setting_key . '_' . time() . '_' . rand(100, 999) . '.' . $ext;
                        $target_path = $upload_dir . $new_name;
                        if (move_uploaded_file($_FILES[$file_input]['tmp_name'], $target_path)) {
                            $rel_path = 'uploads/branding/' . $new_name;
                            set_setting($setting_key, $rel_path, 'landing');
                            $uploaded_keys[$setting_key] = $rel_path;
                        }
                    }
                }
            }

            // List of all manageable landing page settings
            $landing_fields = array(
                // Header & Brand
                'landing_site_title',
                'landing_brand_name',
                'landing_brand_highlight',
                'landing_header_cta_text',
                'landing_header_cta_link',
                'landing_site_logo',
                'landing_site_favicon',
                
                // Hero Section
                'landing_hero_badge',
                'landing_hero_title',
                'landing_hero_title_highlight',
                'landing_hero_lead',
                'landing_hero_pills',
                'landing_hero_cta_primary',
                'landing_hero_cta_secondary',
                'landing_hero_card_title',
                'landing_hero_card_desc',
                'landing_hero_specs',
                'landing_hero_bg_image'
            );

            foreach ($landing_fields as $field) {
                // Do not overwrite if a new file was uploaded in this request
                if (isset($uploaded_keys[$field])) {
                    continue;
                }
                if ($this->input->post($field) !== NULL) {
                    $val = trim($this->input->post($field));
                    // Guard media fields: do not wipe out existing uploaded files if the text box was left blank
                    if (in_array($field, array('landing_site_logo', 'landing_site_favicon', 'landing_hero_bg_image')) && $val === '') {
                        if ($this->input->post('clear_' . $field) == '1') {
                            set_setting($field, '', 'landing');
                        }
                        continue;
                    }
                    set_setting($field, $val, 'landing');
                }
            }

            // SEO Settings
            $seo_fields = array(
                'landing_seo_meta_title',
                'landing_seo_meta_desc',
                'landing_seo_meta_keywords',
                'landing_seo_canonical_url',
                'landing_seo_og_title',
                'landing_seo_og_desc',
                'landing_seo_og_image',
                'landing_seo_twitter_card'
            );
            foreach ($seo_fields as $field) {
                if ($this->input->post($field) !== NULL) {
                    $val = $this->input->post($field);
                    set_setting($field, $val, 'seo');
                }
            }

            // Social Media Settings
            $social_fields = array(
                'landing_social_facebook',
                'landing_social_instagram',
                'landing_social_twitter',
                'landing_social_linkedin',
                'landing_social_youtube',
                'landing_social_whatsapp'
            );
            foreach ($social_fields as $field) {
                if ($this->input->post($field) !== NULL) {
                    $val = $this->input->post($field);
                    set_setting($field, $val, 'social');
                }
            }

            $this->session->set_flashdata('success', 'Public product website CMS settings updated successfully!');
            redirect(superadmin_url('website?tab=' . urlencode($active_tab)));
            return;
        }

        // Load all landing, SEO, and social settings
        $settings_query = $this->db->where_in('setting_group', array('landing', 'seo', 'social'))->get('business_settings')->result();
        $settings = array();
        foreach ($settings_query as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }

        $data = array();
        $data['settings'] = $settings;
        $data['active_tab'] = $this->input->get('tab', TRUE) ? $this->input->get('tab', TRUE) : 'hero';

        // Load dynamic templates and layouts
        $templates = array();
        if ($this->db->table_exists('marketplace_templates')) {
            $templates = $this->db->order_by('sort_order', 'ASC')->order_by('id', 'ASC')->get('marketplace_templates')->result();
            foreach ($templates as $t) {
                $t->layouts = $this->db->where('template_id', $t->id)->order_by('sort_order', 'ASC')->order_by('layout_number', 'ASC')->get('marketplace_template_layouts')->result();
            }
        }
        $data['templates'] = $templates;

        $this->render('website/index', $data, 'Product Website CMS Management');
    }
}
