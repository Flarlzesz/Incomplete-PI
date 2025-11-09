<?php

class getWeakPoints{
// Google Sheet info
    private $sheetId;
    private $gid;

    private $csvUrl;


    public function __construct(){
        $this->sheetId = "1GRoLNfX9nXwDE3AIXguPbzX-T_kAIK8kitCVmKIJmt4";
        $this->gid = "1828919576";
        $this->csvUrl = "https://docs.google.com/spreadsheets/d/$this->sheetId/export?format=csv&gid=$this->gid";
    }

    public function getWeakPoints(){
        $csvData = file_get_contents($this->csvUrl);
        if ($csvData === false) {
            die("Failed to download sheet data");
        }

        $lines = explode("\n", trim($csvData));

        $result = [];
        foreach ($lines as $line) {
            // Use str_getcsv in case values contain commas
            $fields = str_getcsv($line);
            if (isset($fields[0]) && trim($fields[0]) !== '') {
                $result[] = trim($fields[0]);
            }
        }

        unset($result[0]);
        return $result;
    }

}

?>