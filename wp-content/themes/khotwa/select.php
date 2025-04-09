<!-- select language -->
<?php
                            $custom_flags = [
                                'fr' => get_template_directory_uri() . '/assets/img/flags/fr.png',
                                'ar' => get_template_directory_uri() . '/assets/img/flags/ar.png',
                                'en' => get_template_directory_uri() . '/assets/img/flags/en.png',
                            ];
                        ?>

                        <?php if (function_exists('pll_the_languages')) :
                            $languages = pll_the_languages(array(
                                'raw' => 1,
                                'hide_if_no_translation' => 1,
                            ));

                            $custom_flags = [
                                'fr' => get_template_directory_uri() . '/assets/img/flags/fr.png',
                                'ar' => get_template_directory_uri() . '/assets/img/flags/ar.png',
                                'en' => get_template_directory_uri() . '/assets/img/flags/en.png',
                            ];

                            if (!empty($languages)) :
                                $current_lang = null;
                                foreach ($languages as $lang) {
                                    if (!empty($lang['current_lang']) && $lang['current_lang']) {
                                        $current_lang = $lang;
                                        break;
                                    }
                                }

                                if ($current_lang):
                                    $current_flag = $custom_flags[$current_lang['slug']] ?? $current_lang['flag']; ?>

                                    <div class="language-dropdown-wrapper mr-5">
                                        <div class="language-toggle" onclick="document.querySelector('.language-dropdown-list').classList.toggle('show')">
                                            <img src="<?php echo esc_url($current_flag); ?>" alt="<?php echo esc_attr($current_lang['name']); ?>" width="20" height="14">
                                        </div>
                                        <ul class="language-dropdown-list">
                                            <?php foreach ($languages as $lang) :
                                                if (empty($lang['current_lang'])) :
                                                    $flag_url = $custom_flags[$lang['slug']] ?? $lang['flag']; ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($lang['url']); ?>">
                                                            <img src="<?php echo esc_url($flag_url); ?>" alt="<?php echo esc_attr($lang['name']); ?>" width="20" height="14">
                                                        </a>
                                                    </li>
                                                <?php endif;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                        <?php
                                endif;
                            endif;
                        endif;
                        ?>