<?php

    class ad_insert extends WidgetHandler {

        /**
         * @brief 위젯의 실행 부분
         *
         * ./widgets/위젯/conf/info.xml 에 선언한 extra_vars를 args로 받는다
         * 결과를 만든후 print가 아니라 return 해주어야 한다
         **/
        function proc($args) {
            # 로그인 정보
            if(!Context::get('is_logged')) return;

            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;
            if(!$member_srl) return;
            
            #템플릿 설정
            Context::set('adcode', $adcode);
		
            $tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
            Context::set('colorset', $args->colorset);

            $tpl_file = 'ad_insert';

            $oTemplate = &TemplateHandler::getInstance();
            return $oTemplate->compile($tpl_path, $tpl_file);
        }
    }
?>
