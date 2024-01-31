<?php
/**
 * Class Name: cart
 
 */
//exit if accessed directly

if(!defined('ABSPATH')) exit;
class cart {

    public function create_session($key, $value){
        
        if(session_id() == '') {
            session_start();
        }

        // unset($_SESSION['user'][$key]);

        $_SESSION['user'][$key] = $value;    
    }
    
    public function create_session2($key, $value){
        
        if(session_id() == '') {
            session_start();
        }
            
        $_SESSION[$key] = $value;    
    }

    public function edit_userinfo_fedex_shipping($shipping){
        $_SESSION['fedex']['userInfo']['shipping'] = $shipping;
    }

    public function remove_session_items($key) {
        
        unset($_SESSION[$key]);

            // if (empty($_SESSION) || count($_SESSION) == 0) {
            //     $_SESSION = array();

            //     if (ini_get("session.use_cookies")) {
            //         $params = session_get_cookie_params();
            //         setcookie(session_name(), '', time() - 42000,
            //             $params["path"], $params["domain"],
            //             $params["secure"], $params["httponly"]
            //         );
            //     }
            //     session_destroy();
            // }
        
        
    }

    public function retreive_session(){
        if(session_id() == '') {
            session_start();
        }
        $session = $_SESSION;
        return $session;         
    }

    public function destroy_session_data() {
        if(session_id() == '') {
            session_start();
        }
        session_destroy();
    }

    public function select_country($category, $country_name, $data) {
        
        try {
            $createSession = $this->create_session($category, $country_name, $data);

            $responseArr = array(
                'success' => true,
                'session' => $_SESSION
            );
            
            echo json_encode($responseArr);
                
            die();
        } catch (Exception $e) {
            return $e->message;
        }
        // get country data from api 
    }

    public function edit_country_count($category, $country_name, $count){
        try{
            $_SESSION[$category][$country_name][0]->count = $count;
            
            $responseArr = array(
                'success' => true,
                'session' => $_SESSION
            );

            echo json_encode($responseArr);

        } catch(Exception $e){
            return $e->message;
        }
    }

    public function edit_country_case_status($category, $country_name, $status){
        try{
            $_SESSION[$category][$country_name][0]->caseStatus = $status;
            
        } catch(Exception $e){
            return $e->message;
        }
    }

    public function create_service_session(){
        
    }

}