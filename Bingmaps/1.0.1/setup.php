<?php


require($_SERVER['DOCUMENT_ROOT'] . '/lib/Common.php');

require(SERVER_PLUGIN_PATH . PLUGIN_NAME . DS . PLUGIN_VERSION . '/model/helper.php');
require(SERVER_PLUGIN_PATH . PLUGIN_NAME . DS . PLUGIN_VERSION . '/model/base.php');
require(SERVER_PLUGIN_PATH . PLUGIN_NAME . DS . PLUGIN_VERSION . '/model/get.php');
require(SERVER_PLUGIN_PATH . PLUGIN_NAME . DS . PLUGIN_VERSION . '/model/exec.php');


class Setup
{
    private $PG_NAME = PLUGIN_NAME;
    private $PG_URL= PLUGIN_URL;
    protected $smarty;
    protected $oHelper;
    protected $oGet;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('sScriptCrossDomain', CAFE24_CROSS_DOMAIN);
        $this->oGet = new BingmapModelGet();
        $this->oExec = new BingmapModelExec();
        $this->oHelper = new BingmapModelHelper();
        $this->smartyInit();   
        
    }

    private function getAction()
    {
        $sAction = $this->oHelper->getParam('action');
        $sAction = $sAction != "" ? "exec" . ucwords($sAction) : "smartyInit";
        $this->$sAction();
    }

    private function smartyInit()
    {
        $aData = $this->oGet->getData(PLUGIN_USER_ID);

        if (!$aData){
                $this->oExec->insertData($this->getTempData(),PLUGIN_USER_ID);
        }

        $this->smarty->assign("sPgDir",PLUGIN_URL,true);
        $this->smarty->assign("sPgPath", PLUGIN_PATH);
        $this->smarty->assign("PG_NAME", $this->PG_NAME);
        $this->smarty->assign("PG_URL", $this->PG_URL);
        $this->smarty->assign("sPgLib", SERVER_BASE_URL."lib/");
        $this->smarty->assign("sCommonRoot", SERVER_BASE_URL . 'lib/js/common.js');
        $this->smarty->assign("sPopUp", SERVER_BASE_URL . 'lib/js/popup.js');
        $this->smarty->assign("jquery", SERVER_JQUERYJS_URL, true);
        $this->smarty->assign("emulation", SERVER_COMMONJS_URL, true);
        $this->smarty->assign("jqueryuijs", SERVER_JQUERYUIJS_URL, true);
        $this->smarty->assign("jqueryuicss", SERVER_JQUERYUICSS_URL, true);
        $this->smarty->assign("sJsValidate", true);
        $this->smarty->assign("aData", $aData);

        $this->smarty->display("setup.tpl");
    }	

    private function execSavedata()
    {
        $aParam = $this->oHelper->getParams();

        $aSlice = array_slice($aParam['aData'], 9, 19);

        foreach ($aSlice as $key => $val){
                $aSetting[$key] = $val;
        }

        $sSetting = json_encode($aSetting);

        $aData['coordinates'] = preg_replace("/([()])/", "", $aParam['aData']['coordinates']);
        $aData['key'] = $aParam['aData']['key'];
        $aData['title'] = $aParam['aData']['title'];
        $aData['address'] = $aParam['aData']['address'];
        $aData['size'] = $aParam['aData']['size'];
        $aData['height'] = $aParam['aData']['height'];
        $aData['width'] = $aParam['aData']['width'];
        $aData['zoom'] = $aParam['aData']['zoom'];
        $aData['mapType'] = $aParam['aData']['mapType'];
        $aData['mapView'] = $aParam['aData']['mapView'];
        $aData['dashboard'] = $aParam['aData']['dashboard'];

        echo $this->oExec->saveData(PLUGIN_USER_ID, $aData);
    }

    private function getTempData()
    {
        return $aSetting = array (
                "coordinates" => "34.0522342, -118.2436849",
                "key" => "",
                "title" => "Bingmaps",
                "address" => "Los Angeles, CA",
                "size" => "640x480",
                "height" => "480",
                "width" => "640",
                "zoom" => "8",
                "mapType" => "static",
                "mapView" => "1",
                "dashboard" => "2");
    }
}

$setup = new Setup();

/* End of file setup.php */