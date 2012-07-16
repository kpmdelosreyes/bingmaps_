<?php

/**
	* getParams()
	* getParam($sKey)
	* getStringBetween($sString, $sStart, $sEnd)
	* downloadContent($sPath, $iTimeout)
	* getFolderContent($sFolder)
**/

class BingmapModelHelper
{
    /** This function gets all the parameters passed via JS AJAX to a php file **/

    public function getParams()
    {
        $aParam = array_merge($_REQUEST, $_FILES);
        return $aParam;
    }

    /** This function gets the action passed via JS AJAX to a php file **/

    public function getParam($sKey)
    {
        if( is_string($sKey) && trim($sKey) != '') {
            $aParam = $this->getParams();
        return (array_key_exists($sKey, $aParam)) ? $aParam[$sKey] : '';
        }
    }

    /** This function gets the character(s) between two strings / words **/

    public function getStringBetween($sString, $sStart, $sEnd)
    {
        $sString = " " . $sString;
        $sTemp = strpos($sString, $sStart);

        if ($sTemp == 0){
            return "";
        } 
        else {
            $sTemp += strlen($sStart);
            $sLength = strpos($sString, $sEnd, $sTemp) - $sTemp;
            return substr($sString, $sTemp, $sLength);
        }
    }

    /** This function gets content of a specific URL **/

    public function downloadContent($sPath, $iTimeout = 30)
    {
        $cUrl = curl_init();

        curl_setopt($cUrl, CURLOPT_URL, $sPath);
        curl_setopt($cUrl, CURLOPT_FAILONERROR, 1);
        curl_setopt($cUrl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cUrl, CURLOPT_TIMEOUT, $iTimeout);

        $retValue = curl_exec($cUrl);                      
        curl_close($cUrl);

        return $retValue;
    }

    /** This function gets content of a specific Folder **/

    public function getFolderContent($sFolder)
    {
        $aFiles = array();
        $aContent = dir($sFolder);

        while ($sFiles = $aContent->read()){
            $aFiles[] = $sFiles;
        } 

            closedir($aContent->handle());

        return $aFiles;
    }

}