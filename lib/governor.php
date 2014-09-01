<?php
/**
 * 领主系统api 示例文档
 * 
 */

class governor {
    /**
     *授权信息
     * @var type 
     */
    public $auth = array('state' => 0);
    /**
     *配置信息
     * @var type 
     */
    public $config = array('state' => 0);
    /**
     *错误信息
     * @var type 
     */
    public $error = "";
    /**
     *请求信息
     * @var type 
     */
    public $request = "";
    /**
     *响应数据
     * @var type 
     */
    public $response = "";
    /**
     * 初始化governor 检测用户环境
     * @param type $config
     * @return boolean
     */
    public function __construct($config) {
        $this->config = $config;
        if ($this->init()) {
            $this->request = curl_init();
            return true;
        }
    }
    
    /**
     * 检测用户环境
     * @return boolean
     */
    public function init() {
        $phpVersion = explode('.', PHP_VERSION);
        if (!$phpVersion[0] >= 5) {
            $this->error = "php version is too low";
            return false;
        } else {
            if (!$phpVersion[0] >= 3) {
                $this->error = "php version is too low";
                return false;
            }
        }
        $extensions = get_loaded_extensions();
        if (!in_array('curl', $extensions)) {
            $this->error = "Extension failed to load";
            return false;
        }
        return true;
    }
    /**
     * 用户登录
     * @return type
     */
    public function login() {
        $jsonstr = array(
            'action' => 'login',
            'param' => $this->config['auth']
        );
        $query = array(
            'jsonstr' => json_encode($jsonstr)
        );
        $this->query = $query;
        return $this->getAuth();
    }
    
    /**
     * 请求数据
     * @param type $method
     * @return type
     */
    public function request($method = "POST") {
        curl_setopt($this->request, CURLOPT_URL, $this->config['apiUrl']);
        curl_setopt($this->request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($this->request, CURLOPT_POSTFIELDS, $this->query);
        curl_setopt($this->request, CURLOPT_HEADER, 0);
        return $this->response = curl_exec($this->request);
    }


    /**
     * 获取授权
     * @return boolean
     */
    protected function getAuth() {
        $this->request();
        $response = json_decode($this->response);
        if (!$response) {
            $this->error = json_last_error();
            return false;
        } else {
            if ($response->errorCode == 0) {
                $this->message = $response->msg;
                $this->uid = $response->response->uid;
                $this->token = $response->response->token;
                return true;
            } else {
                return false;
            }
        }
    }
    /**
     * 获取 列表
     * @param type $sniffer_id
     * @return type
     */
    public function getlist($sniffer_id) {
        $query = array(
            'jsonstr' => json_encode(
                    array(
                        'action' => 'getlist',
                        'param' => array(
                            'uid' => $this->uid,
                            'project_id' => $sniffer_id,
                            'token' => $this->token,
                        )
                    )
            )
        );
        $this->query = $query;
        return json_decode($this->request());
    }
     /**
      * 更新 ibeacon
      * @param type $mac
      * @param type $data
      * @return type
      */
    public function update($mac, $data) {
        $query = array(
            'jsonstr' => json_encode(
                    array(
                        'action' => 'updatelist',
                        'param' => array(
                            'data' => $data,
                            'sniffermac' => $mac,
                            'uid' => $this->uid,
                            'token' => $this->token,
                        )
                    )
            )
        );
        $this->query = $query;
        return json_decode($this->request());
    }
    
    /**
     * 关闭curl
     * @return type
     */
    public function __destruct() {
        return curl_close($this->request);
    }

}
