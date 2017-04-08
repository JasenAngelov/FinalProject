<div
	class="ui-dialog ui-widget ui-widget-content ui-corner-all dialogfooter"
	tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-1"
	style="display: block; z-index: 1002; outline: 0px; height: auto; width: 650px; top: 222px; left: 375.5px;">
	<div
		class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
		<span class="ui-dialog-title" id="ui-dialog-title-1">Забравена парола</span><a
			href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span
			class="ui-icon ui-icon-closethick">close</span></a>
	</div>
	<div class="ui-dialog-content ui-widget-content"
		style="width: auto; min-height: 0px; height: 196px;" scrolltop="0"
		scrollleft="0">


		<form
			action="/individual/mvc/ForgotPassword/Index?xml_id=%2Fbg-BG%2F&amp;ajaxRequest=true"
			method="post">
			<div id="forgotPassword" class="pmt_doc_wrap">
				<p class="note" style="padding: 1em; text-align: justify;">В случай
					на забравена парола, тя може да бъде сменена онлайн чрез подаване
					на долната заявка и подписването й с КЕП, Е-ТАН или парола от
					дисплей карта. В случай, че нямате регистрирано активно средство за
					сигурност, за да смените Вашата парола е необходимо да посетите
					лично офис на банката.</p>

				<div class="validation-summary-valid"
					data-valmsg-summary-server-side="true">
					<ul>
						<li style="display: none"></li>
					</ul>
				</div>
				<fieldset class="col2">

					<div class="column">

						<label for="Name"> Потребител <span>*</span>




						</label> <input class="input-validation-margin valid"
							data-val="true" data-val-required="Полето е задължително."
							id="Name" name="Name" templateid="PaymentInputWithHelp"
							type="text" value="JasenAngelov111">

						<div>
							<span class="field-validation-valid" data-valmsg-for="Name"
								data-valmsg-replace="true"></span>

						</div>


					</div>

					<div class="column">
						<label for="SecurityDevice" style="white-space: nowrap"> Средство
							за сигурност * </label> <select id="SecurityDevice"
							name="SecurityDevice">

							<option selected="selected" value="5">Парола от Е-ТАН</option>
							<option value="1">парола от диспплей карта</option>

							<option value="3">КЕП - Квалифициран Електронен Подпис</option>

						</select>
					</div>
				</fieldset>
				<fieldset class="col2" id="captchaHoldercall">
					<div class="column">
						<label for="Captcha_Code" style="white-space: nowrap"> Число за
							контрол * </label>
					</div>

					<div class="column">
						<input class="input-validation-margin" data-val="true"
							data-val-regex="Некоректен формат"
							data-val-regex-pattern="[0-9]{6}"
							data-val-required="Полето е задължително."
							helpdescription="Въведете 6-цифреното число, което виждате на своя екран."
							helplink="" helptitle="" id="Captcha_Code" name="Captcha.Code"
							templateid="PaymentInputWithHelp" type="text" value=""> <label
							class="note">Въведете 6-цифреното число, което виждате на своя
							екран.</label>

						<div>
							<span class="field-validation-valid"
								data-valmsg-for="Captcha.Code" data-valmsg-replace="true"></span>

						</div>


					</div>
					<input id="Captcha_EncodedCode" name="Captcha.EncodedCode"
						type="hidden"
						value="B3ozHKkx4unxs/2BIeabecQ9XrE/xSN2d0Sv4DkcgykH4cBYKGRaR3-beodwBMvZKjGMvnlGfS0sQZVJz/F7EA==">
					<div class="column">
						<img id="Captcha_Image"
							src="/individual/page/default.aspx?user_id=&amp;session_id=&amp;xml_id=/bg-BG/.captcha&amp;captcha_key=B3ozHKkx4unxs%2f2BIeabecQ9XrE%2fxSN2d0Sv4DkcgykH4cBYKGRaR3-beodwBMvZKjGMvnlGfS0sQZVJz%2fF7EA%3d%3d"
							alt="">

					</div>
				</fieldset>
				<br style="clear: both;">

				<div class="btnfoot clearfix">

					<a id="cancel" title="Откажи" class="cancel" tabindex="2"><span>Откажи</span></a>

					<a id="changePassword" title="потвърди" class="save" tabindex="1"><span>потвърди</span></a>
				</div>

				<div style="clear: both; line-height: 0px;">&nbsp;</div>

			</div>
			<script id="successTemplate" type="text/x-jquery-tmpl">
                <div class="infoSuccess column">
                    <p>${ Message }</p>
                </div>
            </script>

			<script id="resultStatusTemplate" type="text/x-jquery-tmpl">
        {{if !(TransperantToUser)}}
            {{if (Successful) }}
                <div class="infoSuccess column">
                    <p>
                        <p>${ Message }</p>
                    </p>
                </div>
            {{else}}
                <div class="infoWarning column">
                    <p>
                        <p>${ Message }</p>
                    </p>
                </div>
            {{/if}}
        {{/if}}
    </script>
			<script id="changeResultTemplate" type="text/x-jquery-tmpl">
         <div id="resultStatus">
                {{each(i, Status) OperationStatus}}
                    {{tmpl(Status) "#resultStatusTemplate" }}    
                {{/each}}</div>
    </script>
			<input type="hidden" name="as_sfid"
				value="AAAAAAUCeI6_OXUS2uoQwcGhDS2-_X_wpN5itz0-oKR8xkjKU9N8ADFo1pcjA5mIiELQe7TVZ3XG62S5sWAyjaCJazDezisPwM2KVO1xEyD-3YJSbchzUagGlAbQExZ0PLw47hw="><input
				type="hidden" name="as_fid"
				value="79924397c8966aaf493fc3686e960fa28bf59a17">
		</form>
	</div>
</div>