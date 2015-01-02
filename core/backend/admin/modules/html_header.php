  <script type="text/javascript" src="../../core/backend/admin/modules/share_buttons/socialshareprivacy/js/jquery.socialshareprivacy.js"></script>
   <script type="text/javascript" src="../../core/libs/theme_engine/jquery/jquery-1.11.2.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      if($('#socialshareprivacy').length > 0){
        $('#socialshareprivacy').socialSharePrivacy({
          services : {
            facebook : {
              'perma_option' : 'off'
            }, 
            twitter : {
              'status' : 'off'
            },
            gplus : {
              'dummy_img' : '../../core/backend/admin/modules/share_buttons/socialshareprivacy/images/dummy_gplus_variante.png'
            }
          },
          "css_path"  : "../../core/backend/admin/modules/share_buttons/socialshareprivacy/socialshareprivacy.css",
          "lang_path" : "../../core/backend/admin/modules/share_buttons/socialshareprivacy/lang/",
          "language"  : "de"
        });
      }
    });
  </script>