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

            // Ensure upload destination in root application directory exists
            $root_dir = realpath(FCPATH . '../') ? realpath(FCPATH . '../') . DIRECTORY_SEPARATOR : dirname(FCPATH) . DIRECTORY_SEPARATOR;
            $upload_dir = $root_dir . 'uploads' . DIRECTORY_SEPARATOR . 'branding' . DIRECTORY_SEPARATOR;
            if (!is_dir($upload_dir)) {
                @mkdir($upload_dir, 0755, true);
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

        // Get pricing plans count
        $data['plans'] = $this->db->order_by('sort_order', 'ASC')->get('marketplace_plans')->result();
        $data['settings'] = $settings;
        $data['active_tab'] = $this->input->get('tab', TRUE) ? $this->input->get('tab', TRUE) : 'hero';

        $this->render('website/index', $data, 'Product Website CMS Management');
    }
}
