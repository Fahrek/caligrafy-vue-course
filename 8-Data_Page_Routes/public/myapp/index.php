<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type", content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1 maximum-scale=1">
        <meta name='apple-mobile-web-app-capable' content='yes'>
        <meta name='apple-mobile-web-app-status-bar-style' content='black'>
        <title>Index Page with Vue.js</title>

        <!-- Stylesheet and head scripts go here -->
        <link rel="shortcut icon" href="<?php echo scripts('favicon'); ?>" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo scripts('css'); ?>" />
        <link rel="stylesheet" href="<?php echo scripts('bootstrap_css'); ?>" />
        
    </head>
    
    <body>
        <!-- Beginning of the app -->
        <div id="app">
            <div class="spacer-4"></div>
            <div class="wrapper bounded-large">
                <template v-for="project in projects">
                    <div class="col-sm-6 col-md-4">
                        <a :href="env.home">
                            <div class="card color0 equally-spaced-1 height-fixed dropshadow">
                                <div class="card-image" :style="'background-image: url(' + project.image_url +')'"></div>
                                <div class="spacer-2"></div>
                                <h2 class="medium-text semibold textcolor5 reset-margin">{{ project.title }}</h2>
                                <div class="small-text textcolor3">{{ project.category }}</div>
                                <div class="spacer-1"></div>
                                <div class="wrapper reset-margin">
                                    <p class="textcolor5 default-text block-with-text">{{ project.short_description }}</p>
                                </div>
                                <div class="small-text textcolor3">{{ project.modified_at }}</div>
                                <div class="spacer-1"></div>
                            </div>
                        </a>
                    </div>
                </template>
            </div>
        </div>
        
        <!-- Initialization scripts -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="<?php echo APP_SERVICE_ROOT.'app.js'; ?>"></script>
        <script>loadEnvironment(`<?php echo $env; ?>`);</script>
        <script> 
            /* Loading the app client framework
             * Any environment variables to be passed on from the server can take place in this here
             */
            loadVue({
                scripts: ['main']
             });
        </script>
        
        <!-- Additional scripts go here -->
        <script src="<?php echo scripts('bootstrap_jquery'); ?>"></script>
        <script src="<?php echo scripts('bootstrap_script'); ?>"></script>
        <script src="<?php echo scripts('script'); ?>"></script>
        
        <!--[if lt IE 9] -->
        <script src="<?php echo scripts('fallback_html5shiv'); ?>"></script>
        <script src="<?php echo scripts('fallback_respond'); ?>"></script>
        <!--<![endif]-->
    </body>
</html>