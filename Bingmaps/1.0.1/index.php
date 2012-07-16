<?php
require($_SERVER['DOCUMENT_ROOT'] . '/lib/Common.php');

class Index
{
    protected $smarty;
    protected $con;
    protected $sPgDir;


    public function __construct() {
        
        $this->smarty = new Smarty;
        $this->con = new utilDb();
        $this->sPgDir = SERVER_PLUGIN_URL . PLUGIN_NAME . DS. PLUGIN_VERSION;
        $this->_init();
    }
    
    private function _init()
    {
        $this->_setPluginDefault();
        $this->_smartyconf();
    }
    
    private function _setPluginDefault()
    {
        $this->smarty->assign("sPgDir",PLUGIN_URL,true);
        $this->smarty->assign("sPgLib", SERVER_BASE_URL."lib/");
        $this->smarty->assign("jquery", SERVER_JQUERYJS_URL, true);
        $this->smarty->assign("emulation", SERVER_COMMONJS_URL, true);
        $this->smarty->assign("jqueryuijs", SERVER_JQUERYUIJS_URL, true);
        $this->smarty->assign("jqueryuicss", SERVER_JQUERYUICSS_URL, true);
    }
    public function _smartyconf()
    {
        
        $sHtmlTop = $this->smarty->fetch("header.tpl");
        $sHtmlBottom = $this->smarty->fetch("footer.tpl");
        $sHtmlContents = $this->smarty->fetch("body.tpl");

        $this->smarty->assign("template_top", $sHtmlTop,true);
        $this->smarty->assign("template_bottom", $sHtmlBottom,true);
        $this->smarty->assign("template_contents", $sHtmlContents,true);

        $this->smarty->display('main.tpl');
    }
    

}

$index = new Index();