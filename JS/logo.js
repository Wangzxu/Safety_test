$(function() {
    $(".post-12 .news").each(function() {

        var text = $(this).find(".ly").text(); //此处也可以写成 17/07/2014 一样识别 
        if (text == "中国电子报") {
            $(this).find(".news_ly").addClass("zgdzb");
        }
        if (text == "人民日报") {
            $(this).find(".news_ly").addClass("rmrb");
        }
        if (text == "人民客户端") {
            $(this).find(".news_ly").addClass("rmrb");
        }
        if (text == "龙头新闻") {
            $(this).find(".news_ly").addClass("ltxw");
        }
        if (text == "光明日报") {
            $(this).find(".news_ly").addClass("gmrb");
        }
        if (text == "光明日报客户端") {
            $(this).find(".news_ly").addClass("gmrb");
        }
        if (text == "光明日报新媒体") {
            $(this).find(".news_ly").addClass("gmrb");
        }
        if (text == "科技日报") {
            $(this).find(".news_ly").addClass("kjrb");
        }
        if (text == "南方都市报") {
            $(this).find(".news_ly").addClass("nfdsb");
        }
        if (text == "极光新闻") {
            $(this).find(".news_ly").addClass("jgxw");
        }
        if (text == "中央广播电视总台") {
            $(this).find(".news_ly").addClass("zygbdst");
        }
        if (text == "央广网") {
            $(this).find(".news_ly").addClass("zygbdst");
        }
        if (text == "央视新闻") {
            $(this).find(".news_ly").addClass("ysxw");
        }
        if (text == "中国新闻网") {
            $(this).find(".news_ly").addClass("zgxw");
        }
        if (text == "央广网") {
            $(this).find(".news_ly").addClass("ygw");
        }
        if (text == "央视频") {
            $(this).find(".news_ly").addClass("ysp");
        }
        if (text == "中国青年报") {
            $(this).find(".news_ly").addClass("zgqn");
        }
        if (text == "中国青年网") {
            $(this).find(".news_ly").addClass("zgqn");
        }
        if (text == "东北网") {
            $(this).find(".news_ly").addClass("dbw");
        }
        if (text == "黑龙江网") {
            $(this).find(".news_ly").addClass("hljw");
        }

        if (text == "半月谈") {
            $(this).find(".news_ly").addClass("byt");
        }

        if (text == "北京青年报") {
            $(this).find(".news_ly").addClass("bjqnb");
        }
        if (text == "参考消息") {
            $(this).find(".news_ly").addClass("ckxx");
        }
        if (text == "法制日报") {
            $(this).find(".news_ly").addClass("fzrb");
        }
        if (text == "奋斗") {
            $(this).find(".news_ly").addClass("fd");
        }
        if (text == "工人日报") {
            $(this).find(".news_ly").addClass("grrb");
        }

        if (text == "光明网") {
            $(this).find(".news_ly").addClass("gmw");
        }
        if (text == "国际在线") {
            $(this).find(".news_ly").addClass("gjzx");
        }
        if (text == "哈尔滨电视台") {
            $(this).find(".news_ly").addClass("hebdst");
        }
        if (text == "哈尔滨日报") {
            $(this).find(".news_ly").addClass("hebrb");
        }
        if (text == "哈尔滨新闻网") {
            $(this).find(".news_ly").addClass("hebxww");
        }
        if (text == "黑龙江电视台") {
            $(this).find(".news_ly").addClass("hljdjt");
        }
        if (text == "黑龙江电视台新闻联播") {
            $(this).find(".news_ly").addClass("stxwlb");
        }
        if (text == "黑龙江经济报") {
            $(this).find(".news_ly").addClass("hljjjb");
        }
        if (text == "黑龙江日报") {
            $(this).find(".news_ly").addClass("hljrb");
        }
        if (text == "环球时报") {
            $(this).find(".news_ly").addClass("hqsb");
        }
        if (text == "环球网") {
            $(this).find(".news_ly").addClass("hqw");
        }
        if (text == "解放军报") {
            $(this).find(".news_ly").addClass("jfjb");
        }
        if (text == "解放日报") {
            $(this).find(".news_ly").addClass("jfrb");
        }
        if (text == "经济日报") {
            $(this).find(".news_ly").addClass("jjrb");
        }
        if (text == "科技日报新媒体") {
            $(this).find(".news_ly").addClass("kjrbxmt");
        }
        if (text == "科学时报") {
            $(this).find(".news_ly").addClass("kjsb");
        }
        if (text == "南方报业网") {
            $(this).find(".news_ly").addClass("nfbyw");
        }
        if (text == "南方都市报") {
            $(this).find(".news_ly").addClass("nfdsb");
        }
        if (text == "澎湃新闻") {
            $(this).find(".news_ly").addClass("ppsw");
        }
        if (text == "求是") {
            $(this).find(".news_ly").addClass("qs");
        }
        if (text == "人民日报客户端") {
            $(this).find(".news_ly").addClass("rmrbkhd");
        }
        if (text == "人民网") {
            $(this).find(".news_ly").addClass("rmw");
        }
        if (text == "人民政协报") {
            $(this).find(".news_ly").addClass("rmzxb");
        }
        if (text == "人物杂志") {
            $(this).find(".news_ly").addClass("rwzz");
        }
        if (text == "上海文广新闻传媒") {
            $(this).find(".news_ly").addClass("shwgxwcm");
        }
        if (text == "神州学人") {
            $(this).find(".news_ly").addClass("szxr");
        }
        if (text == "生活报") {
            $(this).find(".news_ly").addClass("shb");
        }
        if (text == "省台新闻联播") {
            $(this).find(".news_ly").addClass("stxwlb");
        }
        if (text == "香港大公文汇传媒") {
            $(this).find(".news_ly").addClass("xgdgwhcm");
        }
        if (text == "新华每日电讯") {
            $(this).find(".news_ly").addClass("xhmrdx");
        }
        if (text == "新华社") {
            $(this).find(".news_ly").addClass("xhs");
        }
        if (text == "新华社新媒体") {
            $(this).find(".news_ly").addClass("xhsxmt");
        }
        if (text == "新华网") {
            $(this).find(".news_ly").addClass("xhw");
        }
        if (text == "新京报") {
            $(this).find(".news_ly").addClass("xjb");
        }
        if (text == "新民网") {
            $(this).find(".news_ly").addClass("xmw");
        }
        if (text == "新晚报") {
            $(this).find(".news_ly").addClass("xwb");
        }
        if (text == "央视网") {
            $(this).find(".news_ly").addClass("ysw");
        }
        if (text == "央视新闻") {
            $(this).find(".news_ly").addClass("ysxw");
        }
        if (text == "扬子晚报") {
            $(this).find(".news_ly").addClass("yzwb");
        }
        if (text == "中国共产党新闻网") {
            $(this).find(".news_ly").addClass("zggcdxww");
        }
        if (text == "中国航天报") {
            $(this).find(".news_ly").addClass("zghtb");
        }
        if (text == "中国教育报") {
            $(this).find(".news_ly").addClass("zgjyb");
        }
        if (text == "中国教育电视台") {
            $(this).find(".news_ly").addClass("zgjydst");
        }
        if (text == "中国经济网") {
            $(this).find(".news_ly").addClass("zgjjw");
        }
        if (text == "中国科学报") {
            $(this).find(".news_ly").addClass("zgkxb");
        }
        if (text == "中国青年报") {
            $(this).find(".news_ly").addClass("zgqnb");
        }
        if (text == "中国青年网") {
            $(this).find(".news_ly").addClass("zgqnw");
        }
        if (text == "中国日报网") {
            $(this).find(".news_ly").addClass("zgrbw");
        }
        if (text == "中国新闻网") {
            $(this).find(".news_ly").addClass("zgxww");
        }
        if (text == "中国新闻周刊") {
            $(this).find(".news_ly").addClass("zgxwzk");
        }
        if (text == "黑龙江广播电视台") {
            $(this).find(".news_ly").addClass("hljgbtv");
        }
        if (text == "央视CGTN") {
            $(this).find(".news_ly").addClass("cgtn");
        }
        if (text == "哈工大全媒体") {
            $(this).find(".news_ly").addClass("hitqmt");
        }
        if (text == "中国科技网") {
            $(this).find(".news_ly").addClass("zgkjw");
        }





    });

})