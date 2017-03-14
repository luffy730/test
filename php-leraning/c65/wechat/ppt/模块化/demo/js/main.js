require.config({
	//基础目录
	baseUrl: "js",
	//模块文件
	paths: {
		//用于服务其他模块，加载css文件
		'css': 'css.min',
		//编辑器
       	'kindeditor': '../component/kindeditor/lang/zh-CN',
        	'kindeditor.main': '../component/kindeditor/kindeditor-all-min',
	},
	shim:{
		'kindeditor': {
            	deps: ['kindeditor.main', 'css!../component/kindeditor/themes/default/default.css']
        	},
	}
});