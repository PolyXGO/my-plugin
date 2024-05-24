<?php

/**
 * Copyright (C) 2023 POLYXGO
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ██████╗  ██████╗ ██╗  ██╗   ██╗██╗  ██╗ ██████╗  ██████╗ 
 * ██╔══██╗██╔═══██╗██║  ╚██╗ ██╔╝╚██╗██╔╝██╔════╝ ██╔═══██╗
 * ██████╔╝██║   ██║██║   ╚████╔╝  ╚███╔╝ ██║  ███╗██║   ██║
 * ██╔═══╝ ██║   ██║██║    ╚██╔╝   ██╔██╗ ██║   ██║██║   ██║
 * ██║     ╚██████╔╝███████╗██║   ██╔╝ ██╗╚██████╔╝╚██████╔╝
 * ╚═╝      ╚═════╝ ╚══════╝╚═╝   ╚═╝  ╚═╝ ╚═════╝  ╚═════╝ 
 */

if (!defined('ABSPATH')) {
    die('Cats cannot jump here');
}

class MyPlugin_Settings_Controller
{
    private static $instance = null;
    private $group_fields = null;
    private $group_slug = null;

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();

            add_action('admin_init', array(self::$instance, MP_PLUGIN_PREFIX . 'settings_fields'));
        }
        return self::$instance;
    }
    public function __construct()
    {
        $this->group_fields = 'mp_setting_fields';
        $this->group_slug = MP_PLUGIN_SLUG;
    }
    
    public static function index()
    {
        $instance = self::get_instance();
?>
        <h1>My Plugin Settings Page</h1>
        <?php
        Mp_SampleCode::sample_code_call_openai();
        ?>
        <!-- Sample element -->
        <!-- Sortable -->
        <div id="handle" class="row">
            <h4 class="col-12">Handle</h4>
            <div id="myListItem" class="list-group col">
                <div class="list-group-item handle" draggable="false"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 1</div>
                <div class="list-group-item handle layer-locked"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 2</div>
                <div class="list-group-item handle"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 3</div>
                <div class="list-group-item handle"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 4</div>
                <div class="list-group-item handle"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 5</div>
                <div class="list-group-item handle"><svg class="handle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z" />
                    </svg>&nbsp;&nbsp;Item 6</div>
            </div>
        </div>
        <!-- Sortable -->
        <!-- Select2 -->
        <div class="mb-2"><select class="js-example-basic form-control" name="language[]" multiple="multiple">
                <option value="PHP">PHP</option>
                <option value="HTML">HTML</option>
                <option value="JS">JavaScript</option>
                <option value="C#">C#</option>
                <option value="C++">C++</option>
                <option value="Python">Python</option>
            </select>
        </div>
        <!-- Select2 -->
        <!-- Offcanvas -->
        <div class="mt-3">
            <button class="btn btn-primary" type="button" data-bs-backdrop="false" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Offcanvas Sample Bootstrap Elements</button>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right - element sample</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <h4>Spinner</h4>
                <!-- Spinner -->
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-warning" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-border text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <!-- Spinner -->

                <h4>Tabs</h4>
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">Content Tab Home</div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">Content Tab Profile</div>
                    <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">Content Tab Disable</div>
                </div>
                <!-- Tabs -->

                <h4>Modal</h4>
                <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Launch static backdrop modal
                </button>

                <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-lg modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="myModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>.modal-fullscreen: Always</div>
                                <div>.modal-fullscreen-sm-down: 576px</div>
                                <div>.modal-fullscreen-md-down: 768px</div>
                                <div>.modal-fullscreen-lg-down: 992px</div>
                                <div>.modal-fullscreen-xl-down: 1200px</div>
                                <div>.modal-fullscreen-xxl-down: 1400px</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

                <h4>Collape</h4>
                <!-- Collape -->
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-bs-target
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
                <!-- Collape -->

                <!-- SweeAlert2 -->
                <h4>SweeAlert2</h4>
                <button class="btn-sweetalert2 btn-primary" aria-label="Try me! Example: A title with a text under">
                    SweetAlert Popup
                </button>

                <button class="btn-sweetalert2-call-api btn-primary" aria-label="Try me! Example: A title with a text under">
                    Call API check IP
                </button>
                <!-- SweeAlert2 -->

                <!-- Accordion -->
                <h4>Accordion</h4>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
                <!-- Accordion -->
                <!-- Popover -->
                <h4>Popover</h4>
                <p>Used to display notes, brief instructions on features, descriptions,...</p>
                <span data-bs-toggle="popover" data-bs-placement="top" data-bs-custom-class="custom-popover" data-bs-title="Custom popover" data-bs-content="This popover is themed via CSS variables."><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg></span>

                <!-- //Popover -->
            </div>
        </div>
        <!-- Offcanvas -->
        <!-- Sample element -->
        <div class="wrap">
            <form method="post" action="options.php">
                <?php
                settings_fields($instance->group_fields);
                do_settings_sections($instance->group_slug);
                submit_button();
                ?>
            </form>
        </div>

    <?php
    }
    public static function sub_menu_settings_type()
    {
    ?>
        <h1>My Plugin Submenu Settings Page</h1>
        <?php
    }

    /**
     * Init setting fields. Function is prefix MP_PLUGIN_PREFIX example: my_plugin_
     */
    public function my_plugin_settings_fields()
    {
        $current_function = MP_PLUGIN_PREFIX . 'func';

        add_settings_section($this->group_fields, __('Settings', MP_PLUGIN_CODE), null, $this->group_slug);
        $this->my_plugin_add_field('checkbox', __('Activation status', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'is_active', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('select', __('Select', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'select', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('text', __('Text', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'name', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('email', __('Email', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'email', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('password', __('Password', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'password', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('color', __('Color', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'color', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('range', __('Range', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'range', $this->group_fields, $this->group_slug, [$this, $current_function]);
        $this->my_plugin_add_field('textarea', __('Texarea', MP_PLUGIN_CODE), MP_PLUGIN_PREFIX . 'textarea', $this->group_fields, $this->group_slug, [$this, $current_function]);
    }

    /**
     * Add setting fields
     * @param string $element_type
     * @param string $label
     * @param string $param_name                String id, name element
     * @param string $group_fields              String group setting field
     * @param string $group_slug                String group setting slug
     * @param string $func_name                 String function name callback
     * @return string HTML element              String HTML
     */
    public function my_plugin_add_field($element_type, $label, $param_name, $group_fields, $group_slug, $func_name)
    {
        register_setting($group_fields, $param_name);
        add_settings_field($param_name, $label, function () use ($func_name, $element_type, $param_name) {
            call_user_func($func_name, $element_type, $param_name);
        }, $group_slug, $group_fields);
    }

    /**
     * Elements by bootstrap at https://getbootstrap.com/docs/5.3/forms/floating-labels/
     *
     * @param  string $element_type             String name: text, select, color, range, date,....
     * @param  string $param_name               String id, name element
     * @return string HTML element              String HTML
     */
    public function my_plugin_func($element_type, $param_name)
    {
        $x = get_option($param_name);
        switch ($element_type) {
            case 'checkbox': {
        ?>
                    <div class="form-check">
                        <input data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Default check tooltip" class="form-check-input" type="checkbox" value="1" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" <?php checked($x, 1); ?>>
                        <label class="form-check-label" for="<?php echo $param_name ?>">
                            Default checkbox
                        </label>
                    </div>
                <?php
                }
                break;
            case 'text': {
                ?>
                    <div class="form-floating">
                        <input class="form-control" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" type="text" value="<?php echo $x ?>" />
                        <label for="<?php echo $param_name ?>">Text</label>
                    </div>
                <?php
                    break;
                }
            case 'email': {
                ?>
                    <div class="form-floating">
                        <input type="email" class="form-control" value="<?php echo $x ?>" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" placeholder="name@example.com" autocomplete="false">
                        <label for="<?php echo $param_name ?>">Email address</label>
                    </div>
                <?php
                    break;
                }
            case 'password': {
                ?>
                    <div class="form-floating">
                        <input type="password" class="form-control" value="<?php echo $x ?>" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" placeholder="name@example.com" autocomplete="false">
                        <label for="<?php echo $param_name ?>">Password</label>
                    </div>
                <?php
                    break;
                }
            case 'textarea': {
                ?>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a content here" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" style="height: 100px"><?php echo $x ?></textarea>
                        <label for="<?php echo $param_name ?>">Content</label>
                    </div>
                <?php
                    break;
                }
            case 'select': {
                ?>
                    <div class="form-floating">
                        <select class="form-select" name="<?php echo $param_name ?>" id="<?php echo $param_name ?>">
                            <option value="1" <?php echo ($x == '1' ? ' selected' : '') ?>>Select 1</option>
                            <option value="2" <?php echo ($x == '2' ? ' selected' : '') ?>>Select 2</option>
                            <option value="3" <?php echo ($x == '3' ? ' selected' : '') ?>>Select 3</option>
                        </select>
                        <label for="<?php echo $param_name ?>">Works with selects</label>
                    </div>
                <?php
                    break;
                }
            case 'color': {
                ?>
                    <label for="<?php echo $param_name ?>" class="form-label">Color picker</label>
                    <input type="color" class="form-control form-control-color" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>" value="<?php echo $x ?>" title="Choose your color">
                <?php
                    break;
                }
            case 'range': {
                ?>
                    <label for="<?php echo $param_name ?>" class="form-label">Example range</label>
                    <input type="range" class="form-range" min="0" max="10" step="1" value="<?php echo $x ?>" id="<?php echo $param_name ?>" name="<?php echo $param_name ?>">
<?php
                    break;
                }
            default:
                # code...
                break;
        }
    }
    
    
}
