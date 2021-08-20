<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="//code.jquery.com/jquery.min.js"></script>
	<title>Snack</title> 
    <style>
        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;}  /* HTML5 display-role reset for older browsers */  article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {display: block;}  body {line-height: 1;}  ol, ul {list-style: none;}  blockquote, q {quotes: none;}  blockquote:before, blockquote:after, q:before, q:after {content: '';content: none;}  table {border-collapse: collapse;border-spacing: 0;}
        .floor { width:1100px; display:block; margin:0 auto; background-color:#7C7877; }
        .floor li { width:32.7%; height:50px; display:inline-block; position:relative; text-align:center; }
        .floor li::after { width:1px; height:40px; display:block; margin: -45px 0 0 0; background-color:#fff; content:''; }
        .floor li:nth-of-type(1)::after { display:none; }
        .floor li a { width:100%; height:100%; display:inline-block; line-height:50px; font-size:25px; color:#fff; text-decoration:none; }
        .snack_type { width:1100px; display:block; margin:0 auto; background-color:#ABD0CE; }
        .snack_type li { width:10.6%; height:40px; display:inline-block; position:relative; text-align:center; }
        .snack_type li::after { width:1px; height:30px; display:block; margin: -35px 0 0 0; background-color:#77AAAD; content:''; }
        .snack_type li:nth-of-type(1)::after { display:none; }
        .snack_type li a { width:100%; height:100%; display:inline-block; line-height:40px; font-size:12px; color:#fff; text-decoration:none; }
        .table-result { width:1000px; display:table; margin:50px auto; text-align:center; }
        .table-result thead th { display:table-cell; height:50px; line-height:50px; font-size:13px; border: 1px solid #ccc; background-color:#fc913a; color:#fff; }
        .table-result tbody tr td { display:table-cell; height:50px; line-height:50px; font-size:12px; border-bottom: 1px solid #ccc;}
        .table-result tbody tr .uniqueID-hidden { display:none; }
		.table-result tbody tr .preference a { width:40px; height:25px; display:block; text-decoration:none; color:#fff; font-size:12px; }
		.table-result tbody tr .btn-like { width:40px; height:20px; display:inline-block; line-height:20px; background-color:yellowgreen; }
		.table-result tbody tr .btn-dislike { width:40px; height:20px; display:inline-block; line-height:20px; background-color:indianred; }
        .table-result tbody tr .btn_admin { background-color:#fff; border: 1px solid #fff; }
        .table-result tbody tr .btn_admin .btn-admin-update { width:40px; height:25px; display:inline-block; line-height:23px; }
        .table-result tbody tr .btn_admin .btn-admin-delete { width:40px; height:25px; display:inline-block; line-height:23px; }
        .table-result tbody tr .btn_admin .btn-admin-update .update-btn { width:40px; height:25px; display:block; color:#fff; font-size:12px; border:none; background-color:#2b90d9;  }
        .table-result tbody tr .btn_admin .btn-admin-delete .delete-btn { width:40px; height:25px; display:block; color:#fff; font-size:12px; border:none; background-color:#8b8687;  }

        .insertForm-wrap { width:500px; display:block; margin:0 auto; padding:20px 0; border-radius:10px; background-color: #fdc23e; }
        .insertForm-wrap form { width:400px; display:block; margin:0 auto; }
        .insertForm-wrap select { width:120px; height:30px; }
        .insertForm-wrap form input { width:188px; height:25px; margin-top:10px; }
        .insertForm-wrap form .snackName { width:264px; }
        .insertForm-wrap form #insertBtn { width:400px; height:50px; background-color:#fff; border:none; }
        .insertForm-wrap form .insert-form-title { font-size:14px; color:#754f44; margin-bottom:10px; text-align: center; }

        .updateForm-wrap { width:500px; display:none; margin:20px auto; padding:20px 0; border-radius:10px; background-color: #30A9DE; }
        .updateForm-wrap form { width:400px; display:block; margin:0 auto; }
        .updateForm-wrap select { width:120px; height:30px; }
        .updateForm-wrap form input { width:188px; height:25px; margin-top:10px; }
        .updateForm-wrap form .snackName { width:264px; }
        .updateForm-wrap form #updateBtn { width:400px; height:50px; background-color:#fff; border:none; }
        .updateForm-wrap form .update-form-title { font-size:14px; color:#fff; margin-bottom:10px; text-align: center; }
        .updateForm-wrap form .Form-updateBtn { width:400px; height:50px; background-color:#fff; border:none; }
    </style>
</head>
<body>
    <header>
        <ul class="floor">
            <li><a href="#" class="all-floor">3/4층</a></li>
            <li><a href="#" class="third-floor">3층</a></li>
            <li><a href="#" class="fourth-floor">4층</a></li>
        </ul>
<!--        <ul class="snack_type">-->
<!--            <li><a href="">전체</a></li>-->
<!--            <li><a href="">과자</a></li>-->
<!--            <li><a href="">사탕/껌</a></li>-->
<!--            <li><a href="">초콜렛</a></li>-->
<!--            <li><a href="">커피</a></li>-->
<!--            <li><a href="">시리얼</a></li>-->
<!--            <li><a href="">음료</a></li>-->
<!--            <li><a href="">아이스크림</a></li>-->
<!--            <li><a href="">간식 외</a></li>-->
<!--        </ul>-->
    </header>
    <section>
        <table class="table-result">
            <thead>
                <th>카테고리</th>
                <th>과자 이름</th>
                <th>초기 수량</th>
                <th>재고</th>
                <th>총 구매 가격</th>
                <th>좋아요</th>
                <th>싫어요</th>
                <th>선호도 조사</th>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="insertForm-wrap">
            <form action="./jiwon_config.php" method="POST" id="insertFormData">
                <input type="hidden" name="type" value="insert">
                <p class="insert-form-title">재고를 추가해주세요😊</p>
                <select name="category" placeholder="종류">
                    <option value="전체">전체</option>
                    <option value="과자">과자</option>
                    <option value="사탕/껌">사탕/껌</option>
                    <option value="초콜렛">초콜렛</option>
                    <option value="커피">커피</option>
                    <option value="시리얼">시리얼</option>
                    <option value="음료">음료</option>
                    <option value="아이스크림">아이스크림</option>
                    <option value="간식 외">간식 외</option>
                </select>
                <input type="text" name="name" placeholder="이름" class="snackName"><br>
                <input type="text" name="total_amount" placeholder="총 구매 수량" class="all-amount">
                <input type="text" name="total_price" placeholder="총 구매 가격" class="all-price"><br>
                <input type="text" name="three_amount" placeholder="3층 초기 재고" class="third-amount">
                <input type="text" name="four_amount" placeholder="4층 초기 재고" class="fourth-amount">
                <input type="submit" name="insertSubmit" value="추가" id="insertBtn">
            </form>
        </div>

        <div class="updateForm-wrap">
            <form action="./jiwon_config.php" method="POST" id="updateFormData">
                <input type="hidden" name="type" value="update">
                <p class="update-form-title">재고를 수정해주세요😊</p>
                <select name="category" placeholder="종류">
                    <option value="전체">전체</option>
                    <option value="과자">과자</option>
                    <option value="사탕/껌">사탕/껌</option>
                    <option value="초콜렛">초콜렛</option>
                    <option value="커피">커피</option>
                    <option value="시리얼">시리얼</option>
                    <option value="음료">음료</option>
                    <option value="아이스크림">아이스크림</option>
                    <option value="간식 외">간식 외</option>
                </select>
                <input type="text" name="name" placeholder="이름" class="snackName"><br>
                <input type="text" name="total_amount" placeholder="총 구매 수량" class="all-amount">
                <input type="text" name="total_price" placeholder="총 구매 가격" class="all-price"><br>
                <input type="text" name="three_amount" placeholder="3층 초기 재고" class="third-amount">
                <input type="text" name="four_amount" placeholder="4층 초기 재고" class="fourth-amount">
                <input type="submit" name="updateSubmit" value="수정" class="Form-updateBtn">
            </form>
        </div>
    </section>
	<script>

	    //load
	    $(function(){
            $.ajax({
                url: "./jiwon_config.php",
                type: 'POST',
                dataType:"json",
                data: {type:'select'},
                success: function(data) {
                    var temp;
                    for(temp = 0; temp < data.length; temp++){
                        var appendList =
                            "<tr class=\"snack-list\">"
                            + "<td class=\"uniqueID-hidden\">" + data[temp].unique_id + "</td>"
                            + "<td class=\"category-value\">" + data[temp].category + "</td>"
                            +"<td class=\"name-value\">" + data[temp].name + "</td>"
                            +"<td class=\"total_amount-value\">" + data[temp].total_amount + "개</td>"
                            +"<td class=\"floor_amount-value\">" + (parseInt(data[temp].three_amount) + parseInt(data[temp].four_amount)) + "개</td>"
                            +"<td class=\"third_amount-value\">" + (parseInt(data[temp].three_amount) + "개</td>"
                            +"<td class=\"fourth_amount-value\">" + + parseInt(data[temp].four_amount)) + "개</td>"
                            +"<td class=\"total_price-value\">" + data[temp].total_price + "원</td>"
                            +"<td>" + data[temp].good + "</td>"
                            +"<td>" + data[temp].dis_like + "</td>"
                            +"<td class=\"preference\">"
                            +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                            +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                            +"<td class=\"btn_admin\">"
                            +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                            +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>";
                            +"</tr>"
                        $("tbody").append(appendList);
                    }
                    $(".third_amount-value").hide();
                    $(".fourth_amount-value").hide();
                },
                error: function () {
                    console.log("err");
                }
            })
        })

		//층별 클릭
        $(document).on("click",".floor a", function(e){
            var $floor = $(this).attr("class");
            $(".updateForm-wrap").css("display","none");
            e.preventDefault();
            $.ajax({
                url: "./jiwon_config.php",
                type: 'POST',
                dataType: "json",
                data: {type:'select'},

                success: function(data) {
                    if($floor === 'all-floor'){
                        $("tbody").html('');
                        var temp;
                        for(temp = 0; temp < data.length; temp++){
                            var appendList =
                                "<tr class=\"snack-list\">"
                                + "<td class=\"uniqueID-hidden\">" + data[temp].unique_id + "</td>"
                                + "<td class=\"category-value\">" + data[temp].category + "</td>"
                                +"<td class=\"name-value\">" + data[temp].name + "</td>"
                                +"<td class=\"total_amount-value\">" + data[temp].total_amount + "개</td>"
                                +"<td class=\"floor_amount-value\">" + Math.round((parseInt(data[temp].three_amount) + parseInt(data[temp].four_amount))) + "개</td>"
                                +"<td class=\"third_amount-value\">" + (parseInt(data[temp].three_amount) + "개</td>"
                                +"<td class=\"fourth_amount-value\">" + + parseInt(data[temp].four_amount)) + "개</td>"
                                +"<td class=\"total_price-value\">" + data[temp].total_price + "원</td>"
                                +"<td>" + data[temp].good + "</td>"
                                +"<td>" + data[temp].dis_like + "</td>"
                                +"<td class=\"preference\">"
                                +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                                +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                                +"<td class=\"btn_admin\">"
                                +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                                +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>";
                                +"</tr>"
                            $("tbody").append(appendList);
                        }
                        $(".third_amount-value").hide();
                        $(".fourth_amount-value").hide();
                    }
                    else if($floor === 'third-floor'){
                        $("tbody").html('');
                        var temp;
                        for(temp = 0; temp < data.length; temp++){
                            var appendList =
                                "<tr class=\"snack-list\">"
                                + "<td class=\"uniqueID-hidden\">" + data[temp].unique_id + "</td>"
                                + "<td class=\"category-value\">" + data[temp].category + "</td>"
                                +"<td class=\"name-value\">" + data[temp].name + "</td>"
                                +"<td class=\"total_amount-value\">" + data[temp].total_amount + "개</td>"
                                +"<td class=\"floor_amount-value\">" + (parseInt(data[temp].three_amount) - parseInt(data[temp].three_stock_count)) + "개</td>"
                                +"<td class=\"third_amount-value\">" + (parseInt(data[temp].three_amount) + "개</td>"
                                +"<td class=\"fourth_amount-value\">" + + parseInt(data[temp].four_amount)) + "개</td>"
                                +"<td class=\"total_price-value\">" + Math.round(((parseInt(data[temp].total_price) / parseInt(data[temp].total_amount)) * parseInt(data[temp].three_amount))) + "원</td>"
                                +"<td>" + data[temp].good + "</td>"
                                +"<td>" + data[temp].dis_like + "</td>"
                                +"<td class=\"preference\">"
                                +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                                +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                                +"<td class=\"btn_admin\">"
                                +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                                +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>";
                                +"</tr>"
                            $("tbody").append(appendList);
                        }
                        $(".third_amount-value").hide();
                        $(".fourth_amount-value").hide();
                    }
                    else if($floor === 'fourth-floor'){
                        $("tbody").html('');
                        var temp;
                        for(temp = 0; temp < data.length; temp++){
                            var appendList =
                                "<tr class=\"snack-list\">"
                                + "<td class=\"uniqueID-hidden\">" + data[temp].unique_id + "</td>"
                                + "<td class=\"category-value\">" + data[temp].category + "</td>"
                                +"<td class=\"name-value\">" + data[temp].name + "</td>"
                                +"<td class=\"total_amount-value\">" + data[temp].total_amount + "개</td>"
                                +"<td class=\"floor_amount-value\">" + (parseInt(data[temp].four_amount) - parseInt(data[temp].four_stock_count)) + "개</td>"
                                +"<td class=\"third_amount-value\">" + (parseInt(data[temp].three_amount) + "개</td>"
                                +"<td class=\"fourth_amount-value\">" + + parseInt(data[temp].four_amount)) + "개</td>"
                                +"<td class=\"total_price-value\">" + Math.round(((parseInt(data[temp].total_price) / parseInt(data[temp].total_amount)) * parseInt(data[temp].four_amount))) + "원</td>"
                                +"<td>" + data[temp].good + "</td>"
                                +"<td>" + data[temp].dis_like + "</td>"
                                +"<td class=\"preference\">"
                                +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                                +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                                +"<td class=\"btn_admin\">"
                                +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                                +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>";
                                +"</tr>"
                            $("tbody").append(appendList);
                        }
                        $(".third_amount-value").hide();
                        $(".fourth_amount-value").hide();
                    }
                },
                error: function(){
                    console.log("err");
                }
            })
        })

        //Insert
        $("#insertBtn").on("click", (e) => {
            var $total_amount = parseInt($("#insertFormData").find($("input[name=total_amount]")).val());
            var $three_amount = parseInt($("#insertFormData").find($("input[name=three_amount]")).val());
            var $four_amount = parseInt($("#insertFormData").find($("input[name=four_amount]")).val());

            e.preventDefault();
            $.ajax({
                url: "./jiwon_config.php",
                type: 'POST',
                dataType:"json",
                data: ($total_amount === ($three_amount+$four_amount)) ? $("#insertFormData").serialize() : alert("층수별 재고 합이 맞지않습니다.") ,

                success: function(data) {
                        var appendList =
                            "<tr class=\"snack-list\">"
                            + "<td class=\"uniqueID-hidden\">" + data.unique_id + "</td>"
                            + "<td class=\"category-value\">" + data.category + "</td>"
                            +"<td class=\"name-value\">" + data.name + "</td>"
                            +"<td class=\"total_amount-value\">" + data.total_amount + "개</td>"
                            +"<td class=\"floor_amount-value\">" + (parseInt(data.three_amount) + parseInt(data.four_amount)) + "개</td>"
                            +"<td class=\"third_amount-value\">" + (parseInt(data.three_amount) + "개</td>"
                                +"<td class=\"fourth_amount-value\">" + + parseInt(data.four_amount)) + "개</td>"
                            +"<td class=\"total_price-value\">" + data.total_price + "원</td>"
                            +"<td>" + data.good + "</td>"
                            +"<td>" + data.dis_like + "</td>"
                            +"<td class=\"preference\">"
                            +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                            +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                            +"<td class=\"btn_admin\">"
                            +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                            +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>";
                        +"</tr>"
                        $("tbody").append(appendList);

                        $(".third_amount-value").hide();
                        $(".fourth_amount-value").hide();
                },
                error: function () {
                    console.log("err");
                }
            })
        })

        //delete
        $(document).on("click",".delete-btn", function(e){
            var unique_ID = $(this).parent().parent().parent().find(".uniqueID-hidden").text();
            var unique_ID_snackList = $(this).parent().parent().parent();
            e.preventDefault();
            $.ajax({
                url: "./jiwon_config.php",
                type: 'POST',
                data: {type:'delete', unique_id :unique_ID},

                success: function(data) {
                    console.log(data);
                    unique_ID_snackList.remove();
                },
                error: function () {
                    console.log("err");
                }
            })
        })

        //update
        var _this;
	    var unique_ID;

        $(document).on("click",".update-btn", function(){
            _this = $(this).parent().parent().parent();
            unique_ID = _this.find(".uniqueID-hidden").text();
            $(".updateForm-wrap").css("display","block");

            $("#updateFormData").find($("select[name=category]")).val(_this.find($(".category-value")).text());
            $("#updateFormData").find($("input[name=name]")).val(_this.find($(".name-value")).text());
            $("#updateFormData").find($("input[name=total_amount]")).val(_this.find($(".total_amount-value")).text().replace(/개/gi,""));
            $("#updateFormData").find($("input[name=total_price]")).val(_this.find($(".total_price-value")).text().replace(/원/gi,""));
            $("#updateFormData").find($("input[name=three_amount]")).val(_this.find($(".third_amount-value")).text().replace(/개/gi,""));
            $("#updateFormData").find($("input[name=four_amount]")).val(_this.find($(".fourth_amount-value")).text().replace(/개/gi,""));
        })

        // $(document).on("click",".floor a", function(e) {
        //     var $floor = $(this).attr("class");
        //    	if($floor === "third-floor"){
        //         $(".updateForm-wrap").html(
        //             + "<form action=\"./jiwon_config.php\" method=\"POST\" id=\"updateFormData\">"
        //             + "<input type=\"hidden\" name=\"type\" value=\"update\">"
        //             + "<p class=\"update-form-title\">재고를 수정해주세요😊</p>"
        //             +"<select name=\"category\" placeholder=\"종류\">"
        //             +"<option value=\"전체\">전체</option>"
        //             +"<option value=\"과자\">과자</option>"
        //             +"<option value=\"사탕/껌\">사탕/껌</option>"
        //             +"<option value=\"초콜렛\">초콜렛</option>"
        //             +"<option value=\"커피\">커피</option>"
        //             +"<option value=\"시리얼\">시리얼</option>"
        //             +"<option value=\"음료\">음료</option>"
        //             +"<option value=\"아이스크림\">아이스크림</option>"
        //             +"<option value=\"간식 외\">간식 외</option></select>"
        //             +"<input type=\"text\" name=\"name\" placeholder=\"이름\" class=\"snackName\"><br>"
        //             +"<input type=\"text\" name=\"total_amount\" placeholder=\"총 구매 수량\" class=\"all-amount\">"
        //             +"<input type=\"text\" name=\"total_price\" placeholder=\"총 구매 가격\" class=\"all-price\"><br>"
        //             +"<input type=\"text\" name=\"three_amount\" placeholder=\"3층 초기 재고\" class=\"third-amount\">"
        //             +"<input type=\"text\" name=\"four_amount\" placeholder=\"4층 초기 재고\" class=\"fourth-amount\" style=\"display:none;\">"
        //             +"<input type=\"submit\" name=\"updateSubmit\" value=\"수정\" class=\"Form-updateBtn\"></form>"
		// 		);
		// 	}
        //    	else if($floor === "fourth-floor"){
        //         $(".updateForm-wrap").html(
        //             + "<form action=\"./jiwon_config.php\" method=\"POST\" id=\"updateFormData\">"
        //             + "<input type=\"hidden\" name=\"type\" value=\"update\">"
        //             + "<p class=\"update-form-title\">재고를 수정해주세요😊</p>"
        //             +"<select name=\"category\" placeholder=\"종류\">"
        //             +"<option value=\"전체\">전체</option>"
        //             +"<option value=\"과자\">과자</option>"
        //             +"<option value=\"사탕/껌\">사탕/껌</option>"
        //             +"<option value=\"초콜렛\">초콜렛</option>"
        //             +"<option value=\"커피\">커피</option>"
        //             +"<option value=\"시리얼\">시리얼</option>"
        //             +"<option value=\"음료\">음료</option>"
        //             +"<option value=\"아이스크림\">아이스크림</option>"
        //             +"<option value=\"간식 외\">간식 외</option></select>"
        //             +"<input type=\"text\" name=\"name\" placeholder=\"이름\" class=\"snackName\"><br>"
        //             +"<input type=\"text\" name=\"total_amount\" placeholder=\"총 구매 수량\" class=\"all-amount\">"
        //             +"<input type=\"text\" name=\"total_price\" placeholder=\"총 구매 가격\" class=\"all-price\"><br>"
        //             +"<input type=\"text\" name=\"three_amount\" placeholder=\"3층 초기 재고\" class=\"third-amount\" style=\"display:none;\">"
        //             +"<input type=\"text\" name=\"four_amount\" placeholder=\"4층 초기 재고\" class=\"fourth-amount\">"
        //             +"<input type=\"submit\" name=\"updateSubmit\" value=\"수정\" class=\"Form-updateBtn\"></form>"
        //         );
		// 	}
        // })

        $(document).on("click",".Form-updateBtn", function(e){
            $(".updateForm-wrap").css("display","none");

            var $category = $("#updateFormData").find($("select[name=category]")).val();
            var $name = $("#updateFormData").find($("input[name=name]")).val();
            var $total_amount = $("#updateFormData").find($("input[name=total_amount]")).val();
            var $total_price = $("#updateFormData").find($("input[name=total_price]")).val();
            var $three_amount = $("#updateFormData").find($("input[name=three_amount]")).val();
            var $four_amount = $("#updateFormData").find($("input[name=four_amount]")).val();

            e.preventDefault();
            $.ajax({
                url: "./jiwon_config.php",
                type: 'POST',
                dataType:"json",
                data: (parseInt($total_amount) === parseInt($three_amount)+parseInt($four_amount)) ? {unique_id: unique_ID, type:'update', category:$category, name:$name, total_amount:$total_amount, total_price:$total_price, three_amount:$three_amount, four_amount:$four_amount } : alert("층수별 재고 합이 맞지않습니다."),

                success: function(data){
                    three_amount = data.three_amount;
                    four_amount = data.four_amount;
                    _this.html(
                        "<td class=\"uniqueID-hidden\">" + data.unique_id + "</td>"
                        + "<td class=\"category-value\">" + data.category + "</td>"
                        +"<td class=\"name-value\">" + data.name + "</td>"
                        +"<td class=\"total_amount-value\">" + data.total_amount + "개</td>"
                        +"<td class=\"floor_amount-value\">" + (parseInt(data.three_amount) + parseInt(data.four_amount)) + "개</td>"
                        +"<td class=\"third_amount-value\">" + (parseInt(data.three_amount) + "개</td>"
                        +"<td class=\"fourth_amount-value\">" + + parseInt(data.four_amount)) + "개</td>"
                        +"<td class=\"total_price-value\">" + data.total_price + "원</td>"
                        +"<td>" + data.good + "</td>"
                        +"<td>" + data.dis_like + "</td>"
                        +"<td class=\"preference\">"
                        +"<div class=\"btn-like\"><a href=\"\">좋아요</a></div>"
                        +"<div class=\"btn-dislike\"><a href=\"\">싫어요</a></div></td>"
                        +"<td class=\"btn_admin\">"
                        +"<div class=\"btn-admin-update\"><input type=\"submit\" value=\"수정\" class=\"update-btn\"></div>"
                        +"<div class=\"btn-admin-delete\"><input type=\"submit\" value=\"삭제\" class=\"delete-btn\"></div></td>"
                        +"</tr>"
                    )
                    $(".third_amount-value").hide();
                    $(".fourth_amount-value").hide();
                },
                error: function () {
                    console.log("err");
                }
            })
        })

	</script>
</body>
</html>