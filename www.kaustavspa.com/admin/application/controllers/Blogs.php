<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('app', 'url', 'string'));
    }

    /**
     * Blog Posts Management
     */
    public function index() {
        $active_template = function_exists('get_active_template') ? get_active_template() : 'template2';
        $curr_layout = function_exists('get_active_home_layout') ? get_active_home_layout() : 2;

        if ($this->input->method() === 'post') {
            $action = $this->input->post('action', TRUE);

            // 1. Save Section Heading & Copy
            if ($action === 'save_blogs_headers') {
                $tagline = trim($this->input->post('blog_tagline', TRUE));
                $title = trim($this->input->post('blog_title', TRUE));
                $desc = trim($this->input->post('blog_desc', TRUE));

                set_tpl_setting($active_template, $curr_layout, 'blog_header', 'tagline', $tagline);
                set_tpl_setting($active_template, $curr_layout, 'blog_header', 'title', $title);
                set_tpl_setting($active_template, $curr_layout, 'blog_header', 'desc', $desc);

                $this->session->set_flashdata('success', 'Blog section headers updated successfully!');
                redirect(admin_url('blogs'));
                return;
            }

            // 2. Add / Edit Blog Post
            if ($action === 'save_blog') {
                $blog_id = (int)$this->input->post('blog_id');
                $title = trim($this->input->post('title', TRUE));
                $slug = trim($this->input->post('slug', TRUE));
                if (empty($slug)) {
                    $slug = url_title($title, 'dash', TRUE);
                }
                $author = trim($this->input->post('author_name', TRUE)) ?: 'Admin';
                $pub_date = trim($this->input->post('published_date', TRUE)) ?: date('Y-m-d');
                $short_desc = trim($this->input->post('short_desc', TRUE));
                $content = $this->input->post('content', FALSE); // WYSIWYG HTML from Summernote
                $tags = trim($this->input->post('tags', TRUE));
                $sort_order = (int)$this->input->post('sort_order') ?: 1;
                $status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';

                // File Upload
                $handle_file_upload = function($field_name, $prefix) {
                    if (!isset($_FILES[$field_name]) || $_FILES[$field_name]['error'] !== UPLOAD_ERR_OK) {
                        return null;
                    }
                    $ext = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
                    if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'))) {
                        return null;
                    }
                    $upload_dir = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'blogs' . DIRECTORY_SEPARATOR;
                    if (!is_dir($upload_dir)) {
                        @mkdir($upload_dir, 0755, true);
                    }
                    $filename = $prefix . '_' . time() . '.' . $ext;
                    if (@move_uploaded_file($_FILES[$field_name]['tmp_name'], $upload_dir . $filename)) {
                        $parent_upload_dir = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'blogs' . DIRECTORY_SEPARATOR;
                        if (is_dir(dirname(FCPATH)) && is_dir($parent_upload_dir)) {
                            @copy($upload_dir . $filename, $parent_upload_dir . $filename);
                        }
                        return 'uploads/blogs/' . $filename;
                    }
                    return null;
                };

                $thumbnail = trim($this->input->post('thumbnail_url', TRUE));
                $uploaded_thumb = $handle_file_upload('thumbnail_file', 'blog_thumb_' . time());
                if ($uploaded_thumb) {
                    $thumbnail = $uploaded_thumb;
                }
                if (empty($thumbnail)) {
                    $thumbnail = 'assets/template2/images/blog/blog-1-1.jpg';
                }

                $blog_data = array(
                    'template_key' => $active_template,
                    'layout_number' => $curr_layout,
                    'title' => $title,
                    'slug' => $slug,
                    'thumbnail' => $thumbnail,
                    'author_name' => $author,
                    'published_date' => $pub_date,
                    'short_desc' => $short_desc,
                    'content' => $content,
                    'tags' => $tags,
                    'sort_order' => $sort_order,
                    'status' => $status
                );

                if ($blog_id > 0) {
                    $this->db->where('id', $blog_id)->update('template_blogs', $blog_data);
                    $this->session->set_flashdata('success', 'Blog article updated successfully!');
                } else {
                    $this->db->insert('template_blogs', $blog_data);
                    $this->session->set_flashdata('success', 'Blog article created successfully!');
                }

                redirect(admin_url('blogs'));
                return;
            }

            // 3. Delete Blog Post
            if ($action === 'delete_blog') {
                $blog_id = (int)$this->input->post('blog_id');
                if ($blog_id > 0) {
                    $this->db->where('id', $blog_id)->delete('template_blogs');
                    $this->session->set_flashdata('success', 'Blog article deleted successfully.');
                }
                redirect(admin_url('blogs'));
                return;
            }
        }

        // Section headers
        $data['blog_tagline'] = get_tpl_setting($active_template, $curr_layout, 'blog_header', 'tagline', 'Latest News');
        $data['blog_title'] = get_tpl_setting($active_template, $curr_layout, 'blog_header', 'title', 'Inside a World of Relaxing Spa Treatments');
        $data['blog_desc'] = get_tpl_setting($active_template, $curr_layout, 'blog_header', 'desc', 'Beautiful skin doesn’t happen overnight. It requires patience, consistency, and the right treatments.');

        // Blog list
        $data['blogs_list'] = $this->db->where('template_key', $active_template)
                                       ->order_by('published_date', 'DESC')
                                       ->get('template_blogs')
                                       ->result();

        $data['active_template'] = $active_template;
        $data['curr_layout'] = $curr_layout;

        $this->render('blogs/index', $data, 'Blog Management');
    }
}
