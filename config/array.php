<?php
header("Content-Type:text/html;charset=utf-8");	
$department_array = array
(
	"内科","外科","妇产科","儿科","骨外科","耳鼻喉科","眼科学","肿瘤科","皮肤科","男科","其他科室"
);
$department_array["内科"]= array
(
	"xxgnk","sjnk","xhnk","nfmk","myk"
);
$department_array["外科"]= array
(
	"sjwk","xxjwk","xwk","rxwk","mnwk"
);
$department_array["妇产科"]= array
(
	"fk","ck","fknfm","fkzl","sz"
);
$department_array["儿科"]= array
(
	"ek","xsek"
);
$department_array["骨外科"]= array
(
	"gk","gzlk","ydyx"
);
$department_array["耳鼻喉科"]= array
(
	"ek","bk","hk"
);
$department_array["眼科学"]= array
(
	"yk","xeyk"
);
$department_array["肿瘤科"]= array
(
	"zlnk","zlwk","flk"
);
$department_array["皮肤科"]= array
(
	"pfxbk","pfmr"
);
$department_array["男科"]= array
(
	"nk"
);
$department_array["其他科室"]= array
(
	"jzk","zzjhs","lcjy"
);
$word_to_Chinese = array
(
	"xxgnk"=>"心血管内科","sjnk"=>"神经内科","xhnk"=>"消化内科","nfmk"=>"内分泌科","myk"=>"免疫科",
	"sjwk"=>"神经外科","xxjwk"=>"心血管外科","xwk"=>"胸外科","rxwk"=>"乳腺外科","mnwk"=>"泌尿外科",
	"fk"=>"妇科","ck"=>"产科","fknfm"=>"妇科内分泌","fkzl"=>"妇科肿瘤","sz"=>"生殖",
	"ek"=>"儿科","xsek"=>"新生儿科",
	"gk"=>"骨科","gzlk"=>"骨肿瘤科","ydyx"=>"运动医学",
	"ek"=>"耳科","bk"=>"鼻科","hk"=>"喉科",
	"yk"=>"眼科","xeyk"=>"小儿眼科",
	"zlnk"=>"肿瘤内科","zlwk"=>"肿瘤外科","flk"=>"放疗科",
	"pfxbk"=>"皮肤性病科","pfmr"=>"皮肤美容",
	"nk"=>"男科",
	"jzk"=>"急诊科","zzjhs"=>"重症监护室","lcjy"=>"临床检验"
);
?>