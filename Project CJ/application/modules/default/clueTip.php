 <style type="text/css" media="screen">
    <!--
       
      
        
        .bubbleInfo {
            position: relative;
            top: 150px;
            left: 100px;
            width: 500px;
        }
        
        .trigger {
            position: absolute;
        }
     
        /* Bubble pop-up */
        .popup {
        	position: absolute;
        	display: none;
        	z-index: 50;
        	border-collapse: collapse;
        	display: block;
			text-decoration: none;
			color: #717171;
			font: bold 11px Arial, sans-serif;
			text-shadow: 0px 1px white;
			padding: 5px 8px;
		
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
		
			-webkit-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
			-moz-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
			box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
			background: #f9f9f9;
		
			background: -webkit-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
			background: -moz-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
			background: -o-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
			background: -ms-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
			background: linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#e8e8e8',GradientType=0 );
        }

     
        
    
    </style>
 <script type="text/javascript">
    <!--

    $(function () {
        $('.bubbleInfo').each(function () {
            var distance = 10;
            var time = 250;
            var hideDelay = 500;

            var hideDelayTimer = null;

            var beingShown = false;
            var shown = false;
            var trigger = $('.trigger', this);
            var info = $('.popup', this).css('opacity', 0);


            $([trigger.get(0), info.get(0)]).mouseover(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                if (beingShown || shown) {
                    // don't trigger the animation again
                    return;
                } else {
                    // reset position of info box
                    beingShown = true;

                    info.css({
                        top: 0,
                        left: 250,
                        display: 'block'
                    }).animate({
                        top: '-=' + distance + 'px',
                        opacity: 1
                    }, time, 'swing', function() {
                        beingShown = false;
                        shown = true;
                    });
                }

                return false;
            }).mouseout(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                hideDelayTimer = setTimeout(function () {
                    hideDelayTimer = null;
                    info.animate({
                        top: '-=' + distance + 'px',
                        opacity: 0
                    }, time, 'swing', function () {
                        shown = false;
                        info.css('display', 'none');
                    });

                }, hideDelay);

                return false;
            });
        });
    });
    
    //-->
    </script>


    <div class="bubbleInfo">
        <div>
            <img class="trigger" src="http://jqueryfordesigners.com/demo/images/coda/nav-download.png" id="download" />
        </div>
        <table id="dpop" class="popup">
        	<tbody>
        	<tr>        		
        		<td><table class="popup-contents">
        			<tbody><tr>
        				<th>File:</th>
        				<td>coda 1.1.zip</td>
        			</tr>
        			<tr>
        				<th>Date:</th>
        				<td>11/30/07</td>
        			</tr>
        			<tr>
        				<th>Size:</th>
        				<td>17 MB</td>
        			</tr>
        			<tr>
        				<th>Req:</th>
        				<td>Mac OS X 10.4+</td>
        			</tr>						
        			<tr id="release-notes">
        				<th>Read the release notes:</th>
        				<td><a title="Read the release notes" href="./releasenotes.html">release notes</a></td>
        			</tr>
        		</tbody></table>
        		</td>
        	</tr>        
        </tbody>
        </table>
    </div>