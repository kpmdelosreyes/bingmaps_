<?php

class BingmapModelBase
{
    protected $PG_BINGMAP_MAIN = null;
    protected $PG_BINGMAP_SETTING = null;
    
    public function init()
    {
        $this->PG_BINGMAP_MAIN = 'PG_Bingmap_main';
        $this->PG_BINGMAP_SETTING = 'PG_Bingmap_setting';
        
        return $this->con = new utilDb();
    }
    
    public function getUserId($sUser)
    {
        $this->con = $this->init();
      
        $sSql = "SELECT pm_idx FROM " . $this->PG_BINGMAP_MAIN . " WHERE pm_userid = '" . $sUser . "'";
        $aId = $this->con->query($sSql,'row');

        return (int) $aId['pm_idx'];
        
    }
    
    

}

/*End of model/base.php */