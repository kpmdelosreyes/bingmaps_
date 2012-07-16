<?php
$DocROOT = $_SERVER['DOCUMENT_ROOT'];
require_once($DocROOT . '/lib/conf.sys.php');

class BingmapInstall
{
    private $sPrefix = "PG_";
    private $PG_BINGMAPS_SETTING = null;
    private $con;

    public function __construct()
    {
        $this->PG_BINGMAPS_SETTING = $this->sPrefix . "Bingmaps_setting";
        $this->PG_BINGMAPS_DATA = $this->sPrefix . "Bingmaps_data";
        $this->con = new utilDb();

        $this->install();
        $this->install2();
    }

    public function install()
    {
        $sql = "CREATE TABLE IF NOT EXISTS {$this->PG_BINGMAPS_SETTING} (
                      `pbm_idx` INT(11) NOT NULL auto_increment,
                      `pbm_pm_idx` INT(11) NOT NULL,
                      `pbm_center_point` VARCHAR(200) NOT NULL, 
                      `pbm_key` TEXT NOT NULL, 
                      `pbm_title` VARCHAR(250) NOT NULL, 
                      `pbm_address` VARCHAR(250) NOT NULL, 
                      `pbm_size` VARCHAR(30) NOT NULL, 
                      `pbm_height` VARCHAR(30) NOT NULL,
                      `pbm_width` VARCHAR(30) NOT NULL,
                      `pbm_zoom` INT(11) NOT NULL, 
					  `pbm_map_type` VARCHAR(60) NOT NULL,
                      `pbm_map_view` VARCHAR(60) NOT NULL,
                      `pbm_dashboard` VARCHAR(60) NOT NULL,
                      PRIMARY KEY  (`pbm_idx`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
        
        $this->con->query($sql);
    }
    
    public function install2()
    {
        $sql = "CREATE TABLE IF NOT EXISTS {$this->PG_BINGMAPS_DATA} (
                      `pbm_idx` INT(11) NOT NULL auto_increment,
                      `pbm_pm_idx` INT(11) NOT NULL,
                      `pbm_map_type` VARCHAR(60) NOT NULL,
                      `pbm_dyn_title` VARCHAR(60) NOT NULL,
                      `pbm_dyn_desc` TEXT NOT NULL,
                      PRIMARY KEY  (`pbm_idx`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
        
        $this->con->query($sql);
    }
    
    
}

$install = new BingmapInstall;
