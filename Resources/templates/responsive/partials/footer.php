<footer id="footer" class="footer">
    <div class="container-fluid">
      <div class="container">
        <?php if ($this->get_user()) { ?>
        <div class="row">
          <script id="chatBroEmbedCode">/* Chatbro Widget Embed Code Start */function ChatbroLoader(chats,async){async=!1!==async;var params={embedChatsParameters:chats instanceof Array?chats:[chats],lang:navigator.language||navigator.userLanguage,needLoadCode:'undefined'==typeof Chatbro,embedParamsVersion:localStorage.embedParamsVersion,chatbroScriptVersion:localStorage.chatbroScriptVersion},xhr=new XMLHttpRequest;xhr.withCredentials=!0,xhr.onload=function(){eval(xhr.responseText)},xhr.onerror=function(){console.error('Chatbro loading error')},xhr.open('GET','//www.chatbro.com/embed.js?'+btoa(unescape(encodeURIComponent(JSON.stringify(params)))),async),xhr.send()}/* Chatbro Widget Embed Code End */ChatbroLoader({encodedChatId: '128iv'});</script>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-8">
              <ul class="list-inline footer-list">
                <li><a class="fa fa-github" target="_blank" href="https://github.com/GoteoFoundation/goteo"> Powered by goteo</a></li>
              </ul>
            </div>

            <div class="col-sm-4 hidden-xs">
              <ul class="list-inline text-right">
                <li class="label-img"><a href="#"><?=$this->text('footer-platoniq-iniciative') ?></a></li>
                <li><a href="http://fundacion.goteo.org"><img src="/view/css/logoFG.png" class="img-responsive logo" alt="Fundación Goteo"></a></li>
              </ul>
            </div>
        </div>
        <div class="social text-center">
          <a class="fa fa-twitter" title="" target="_blank" href="<?=$this->text('social-account-twitter') ?>"></a>
          <a class="fa fa-facebook" title="" target="_blank" href="<?=$this->text('social-account-facebook') ?>"></a>
          <a class="fa fa-instagram" title="" target="_blank" href="<?=$this->text('social-account-instagram') ?>"></a>
          <a class="fa fa-telegram" title="" target="_blank" href="<?=$this->text('social-account-telegram') ?>"></a>
          <a class="fa fa-github" title="" target="_blank" href="<?=$this->text('social-account-github') ?>"></a>
          <a class="fa fa-newspaper-o" title="" target="_blank" href="/newsletter"></a>
        </div>
      </div>
    </div>
</footer>



