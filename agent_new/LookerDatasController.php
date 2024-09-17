<?php
class LookerDatasController extends AppController {
    public $uses = array('Addbranch', 'Masjclrentry', 'Masattandance', 'FieldAttendanceMaster', 'OnSiteAttendanceMaster', 'Attendance','VisitorMaster');

    public function beforeFilter(){
        parent::beforeFilter(); 
        $this->Auth->allow('export_report','active_data','left_data','visitor_data','attandance_data');
       
    }

    public function joiner_data() {

        
            $conditoin = array(
                'Status' => 1,
                'DATE(DOJ) >' => '2024-01-01',
                'EmpCode !=' => ''
            );
            
            $fields = array(
                'EmpCode',
                'EmpName',
                'BranchName',
                'CostCenter',
                'Dept',
                'Desgination',
                'DOJ',
                'Source',
                'SourceType',
                'Mobile',
                'NetInhand',
                'CTC'
            );
            
            $data = $this->Masjclrentry->find('all', array(
                'conditions' => $conditoin,
                'fields' => $fields
            ));
            
            $jsonResponse = array();
            
            foreach ($data as $record) {
                $jsonResponse[] = array(
                    'EmpCode' => $record['Masjclrentry']['EmpCode'],
                    'EmpName' => $record['Masjclrentry']['EmpName'],
                    'BranchName' => $record['Masjclrentry']['BranchName'],
                    'CostCenter' => $record['Masjclrentry']['CostCenter'],
                    'Dept' => $record['Masjclrentry']['Dept'],
                    'Desgination' => $record['Masjclrentry']['Desgination'],
                    'DOJ' => $record['Masjclrentry']['DOJ'],
                    'Source' => $record['Masjclrentry']['Source'],
                    'SourceType' => $record['Masjclrentry']['SourceType']);
            }
            
            header('Content-Type: application/json');
            echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
            exit;
       
    }

    public function active_data() {

        
        $conditoin = array(
            'Status' => 1,
            'EmpCode !=' => ''
        );
        
        
        $data = $this->Masjclrentry->find('all', array(
            'conditions' => $conditoin
        ));
       // print_r($data);
        $jsonResponse = array();
        
        foreach ($data as $record) {
            $jsonResponse[] = array(
                'EmpCode' => $record['Masjclrentry']['EmpCode'],
                'BioCode' => $record['Masjclrentry']['BioCode'],
                'EmpType' => $record['Masjclrentry']['EmpType'],
                'EmpName' => $record['Masjclrentry']['EmpName'],
                'Gendar' => $record['Masjclrentry']['Gendar'],
                'DOJ' => $record['Masjclrentry']['DOJ'],
                'Desgination' => $record['Masjclrentry']['Desgination'],
                'Dept' => $record['Masjclrentry']['Dept'],
                'Profile' => $record['Masjclrentry']['Profile'],
                'EmpLocation' => $record['Masjclrentry']['EmpLocation'],
                'CostCenter' => $record['Masjclrentry']['CostCenter'],
                'BranchName' => $record['Masjclrentry']['BranchName']);
        }
        
        header('Content-Type: application/json');
        echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
        exit;
   
    }

    public function left_data() {

        
        $conditoin = array(
            'Status' => 0,
            'DATE(ResignationDate) >' => '2024-01-01',
            'EmpCode !=' => ''
        );
        
        
        $data = $this->Masjclrentry->find('all', array(
            'conditions' => $conditoin
        ));
       // print_r($data);
        $jsonResponse = array();
        
        foreach ($data as $record) {
            $jsonResponse[] = array(
                'EmpCode' => $record['Masjclrentry']['EmpCode'],
                'BioCode' => $record['Masjclrentry']['BioCode'],
                'EmpType' => $record['Masjclrentry']['EmpType'],
                'EmpName' => $record['Masjclrentry']['EmpName'],
                'Gendar' => $record['Masjclrentry']['Gendar'],
                'DOJ' => $record['Masjclrentry']['DOJ'],
                'Desgination' => $record['Masjclrentry']['Desgination'],
                'Dept' => $record['Masjclrentry']['Dept'],
                'Profile' => $record['Masjclrentry']['Profile'],
                'EmpLocation' => $record['Masjclrentry']['EmpLocation'],
                'CostCenter' => $record['Masjclrentry']['CostCenter'],
                'BranchName' => $record['Masjclrentry']['BranchName'],
                'ResignationDate' => $record['Masjclrentry']['ResignationDate']);
        }
        
        header('Content-Type: application/json');
        echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
        exit;
   
    }

    public function visitor_data() {

        
        $conditoin = array(
            'DATE(createdate) >' => '2024-01-01'
        );
        
        
        $data = $this->VisitorMaster->find('all',array('conditions'=>$conditoin));
        //print_r($data);
        $jsonResponse = array();
        
        foreach ($data as $record) {
            $jsonResponse[] = array(
                'branch_name' => $record['VisitorMaster']['branch_name'],
                'Source_Of_Information' => $record['VisitorMaster']['Source_Of_Information'],
                'visitor_name' => $record['VisitorMaster']['visitor_name'],
                'visitor_company' => $record['VisitorMaster']['visitor_company'],
                'visitor_purpose' => $record['VisitorMaster']['visitor_purpose'],
                'mobile_no' => $record['VisitorMaster']['mobile_no'],
                'wt_meet' => $record['VisitorMaster']['wt_meet'],
                'visitor_address' => $record['VisitorMaster']['visitor_address'],
                'createdate' => $record['VisitorMaster']['createdate']);
        }
        
        header('Content-Type: application/json');
        echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
        exit;
   
    }

    public function attandance_data() {

        
        $conditoin = array(
            'DATE(createdate) >' => '2024-01-01'
        );
        
        $wheretag .= '1=1';
        $wheretag1 .= 'group by costcenter';

        $data = $this->Attendance->query("SELECT BranchName,costcenter,MAX(AttandDate) as last_upload_date FROM `Attandence` WHERE $wheretag  AND costcenter IS NOT NULL  $wheretag1 ");
        //print_r($data);
        $jsonResponse = array();
        
        foreach ($data as $record) {
              //print_r($record);die;
            $jsonResponse[] = array(
                'BranchName' => $record['Attandence']['BranchName'],
                'costcenter' => $record['Attandence']['costcenter'],
                'IMPdate' => $record[0]['last_upload_date']);
        }
        
        header('Content-Type: application/json');
        echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
        exit;
   
    }
}
?>