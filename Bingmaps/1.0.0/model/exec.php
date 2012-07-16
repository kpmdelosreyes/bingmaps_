<?php

class BingmapModelExec extends BingmapModelBase
{
    protected $con;
    public function saveData($sUser, $aData)
    {
        $this->con = $this->init();

        $iUserId = $this->getUserId($sUser);
        
        $sSql = "UPDATE " . $this->PG_BINGMAP_SETTING . " SET
                pbm_center_point = '" . $aData['coordinates'] . "',
                pbm_key = " . $aData['key'] . ",
                pbm_title = '" . $aData['title'] . "',
                pbm_address = '" . $aData['address'] . "',
                pbm_size = '" . $aData['size'] . "',
                pbm_height = " . $aData['height'] . ",
                pbm_width = " . $aData['width'] . ",
                pbm_zoom = " . $aData['zoom'] . ",
                pbm_map_type = " . $aData['mapType'] . ",
                pbm_map_view = '" . $aData['mapView'] . "',
                pbm_dashboard = '" . $aData['dashboard'] . "'
               
                WHERE pbm_pm_idx = " . $iUserId . "";

      $this->con->query($sSql);
    }

    public function insertData($aData, $sUser)
    {
        $this->con = $this->init();

        $iUserId = $this->getUserId($sUser);

        $sSql = "INSERT INTO " . $this->PG_BINGMAP_SETTING . " (pbm_pm_idx,
                                                                pbm_center_point,
                                                                pbm_key,
                                                                pbm_title,
                                                                pbm_address,
                                                                pbm_size,
                                                                pbm_height,
                                                                pbm_width,
                                                                pbm_zoom,
                                                                pbm_map_type,
                                                                pbm_map_view,
                                                                pbm_dashboard)
                VALUES (" . $iUserId . ",'" . $aData['coordinates'] . "','" . $aData['key'] . "','" . $aData['title'] . "','" . $aData['address'] . "','" . $aData['size'] . "'," . $aData['height'] . "," . $aData['width'] . "," . $aData['zoom'] . ",'" . $aData['mapType'] . "', " . $aData['mapView'] . ", " . $aData['dashboard'] . ")";

        return $this->con->query($sSql);
    }
}
