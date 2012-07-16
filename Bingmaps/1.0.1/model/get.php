<?php

class BingmapModelGet extends BingmapModelBase
{
    public function getData($sUser)
{
        $this->con = $this->init();

        $iUserId = $this->getUserId($sUser);

        $sSql = "SELECT * FROM " . $this->PG_BINGMAP_SETTING . " WHERE pbm_pm_idx = " . $iUserId . "";

      $this->con->query($sSql, "row");
    }
}
