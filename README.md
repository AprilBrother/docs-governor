	
	Governor MANAGEMENT SYSTEM API DOCUMENT (English)

###  1、Authorization

####Request address

	http://governor.aprbrother.com/api.php

####Request method

	post

####Request parameters

	jsonstr

####Request Parameter Description
	
	jsonstr:{
		"action": "login",
		"param": {
			"username": "xxx@gmail.com",
			"password":"xxx"}
	}

####Response Data Description

	 errorCode 0 success
	 uid	
	 errorCode 11001 username fail
	 errorCode 11002 password fail
	 msg     errorinfo
	 
	 
####2、get iBeacon list

	http://governor.aprbrother.com/api.php

####Request method

	post

####Request parameters

	jsonstr

####Request Parameter Description

	jsonstr:{
		"action": "getlist",
		"param": {
			"uid": "xxx@gmail.com",
			"project_id":1
			"token":"x3CYbrKln2dtWKasx6nBn8ZTcKifZW5XbFtvq3FxnIbbqcqmpZPSlVVxpHOTbZxYm2Vqa5drZGxweaWpZZzR0Yhx2G5obIejVXGac5htnbM="
			}
	}
	

####Response Data Description

	正确返回为 json 字符串
	内部包括字段 errorCode 属性 值为0 表示正确访问 其他为 访问错误
	字段 msg 属性为 服务器返回的 信息
	字段 total 属性为 iBeacon的数量
	字段 response 属性 为 对象数组
		每个response 对象数组里面为一个 iBeacon 对象
		每个iBeacon 对象包括
			uuid 属性    		说明:iBeacon唯一标示
			mac	属性			说明:iBeaconmac地址		
			major 属性		说明:iBeacon主要版本号
			minor 属性		说明:iBeacon次要版本号
			measurepower 属性 说明:ibea校准值校准值
			frequency属性	    说明:iBeacon属性频率
			txPower 属性 	    说明:iBeacon剩余电量
			passwd 属性		说明:iBeacon修改密码



####3、update iBeacon 

	http://governor.aprbrother.com/api.json

####Request method

	post

####Request parameters

	jsonstr

####Request Parameter Description
	
	jsonstr 为 json 字符串
	内部包括字段 action 属性为请求的 动作 值为 updatelist,
	内部包括字段 param  属性为 一个对象
	param  属性 包括属性 uid	用户的 uid	
	param  属性 包括属性 sniffermac	用户的 iBeacon 所属的sniffermac地址
	param  属性 包括属性 token	用户的 token
	param  属性 包括属性 data 为要修改的 iBeacon 信息
		data 为一个对象数组 每个对象包括如下信息
			uuid 属性 			说明:iBeacon唯一标示
			mac 属性			    说明:iBeaconnac地址
			major 属性			说明:iBeacon主要版本号
			minor 属性			说明:iBeacon次要版本号
			measuredpower 属性    说明:iBeacon校准值校准值
			rssi 属性				说明:iBeacon信号强度
			status 属性			说明:iBeacon 状态信息
			batterylevel 属性 	说明:iBeacon剩余电量

####Response Data Description
	
		正确返回为 json 字符串
	    内部包括字段 errorCode 属性 值为0 表示正确访问 其他为 访问错误
		内部包括字段 msg 为服务器响应信息


	

===========================================================================================

	领主系统 API 文档 (中文)
	
	
###  1、登录领主

####请求地址 

	http://governor.aprbrother.com/api.json

####请求方式 

	post

####请求参数

	jsonstr

####请求参数说明
	
	jsonstr 为 json 字符串
	内部包括字段 action 属性为请求的 动作 值为 login,
	内部包括字段 param  属性为 一个对象
	param 内部包括属性username为用户名,password 为密码

####返回数据说明

	正确返回为 json 字符串
	内部包括字段 errorCode 属性 值为0 表示正确访问 其他为 访问错误
	字段 msg 属性为 服务器返回的 信息
	字段 response 属性 为 请求数据信信息 内部包括 uid 用户的 id token 用户的 token 以后用到

	错误返回为 json 字符串
	内部包括字段 errorCode 属性 值为11001 表示授权错误 用户名错误
	字段 msg 属性为 服务器返回的 密码不正确

	错误返回为 json 字符串
	内部包括字段 errorCode 属性 值为11002 表示授权错误 密码错误
	字段 msg 属性为 服务器返回的 密码不正确



####2、获取iBeacon列表

	http://governor.aprbrother.com/api.json

####请求方式 

	post

####请求参数

	jsonstr

####请求参数说明
	
	jsonstr 为 json 字符串
	内部包括字段 action 属性为请求的 动作 值为 getlist,
	内部包括字段 param  属性为 一个对象
	param 内部包括属性uid为用户id,project_id 为项目id token为成功登录之后获取的 token

####返回数据说明

	正确返回为 json 字符串
	内部包括字段 errorCode 属性 值为0 表示正确访问 其他为 访问错误
	字段 msg 属性为 服务器返回的 信息
	字段 total 属性为 iBeacon的数量
	字段 response 属性 为 对象数组
		每个response 对象数组里面为一个 iBeacon 对象
		每个iBeacon 对象包括
			uuid 属性    		说明:iBeacon唯一标示
			mac	属性			说明:iBeaconmac地址		
			major 属性		说明:iBeacon主要版本号
			minor 属性		说明:iBeacon次要版本号
			measurepower 属性 说明:ibea校准值校准值
			frequency属性	    说明:iBeacon属性频率
			txPower 属性 	    说明:iBeacon剩余电量
			passwd 属性		说明:iBeacon修改密码



####3、修改iBeacon数据

	http://governor.aprbrother.com/api.json

####请求方式 

	post

####请求参数

	jsonstr

####请求参数说明
	
	jsonstr 为 json 字符串
	内部包括字段 action 属性为请求的 动作 值为 updatelist,
	内部包括字段 param  属性为 一个对象
	param  属性 包括属性 uid	用户的 uid	
	param  属性 包括属性 sniffermac	用户的 iBeacon 所属的sniffermac地址
	param  属性 包括属性 token	用户的 token
	param  属性 包括属性 data 为要修改的 iBeacon 信息
		data 为一个对象数组 每个对象包括如下信息
			uuid 属性 			说明:iBeacon唯一标示
			mac 属性			    说明:iBeaconnac地址
			major 属性			说明:iBeacon主要版本号
			minor 属性			说明:iBeacon次要版本号
			measuredpower 属性    说明:iBeacon校准值校准值
			rssi 属性				说明:iBeacon信号强度
			status 属性			说明:iBeacon 状态信息
			batterylevel 属性 	说明:iBeacon剩余电量
	

