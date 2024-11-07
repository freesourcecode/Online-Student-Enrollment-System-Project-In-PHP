     
      <footer>
        <p align="center">&copy; Kabankalan Catholic College 2013 - <a href="http://itsourcecode.com/">www.kcc.edu.ph</a></p>
         <script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
         <script src="js/tooltip.js"></script>
		 <script src="assets/js/jquery.js"></script>
	     <script src="js/bootstrap.min.js"></script>
		 <script src="js/popover.js"></script>
		 <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		 <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
    
    <script type="text/javascript">
	$('.form_curdate').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_bdatess').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
</script>
<script>
  function checkall(selector)
  {
    if(document.getElementById('chkall').checked==true)
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(selector);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
  </script>			
	
      </footer>

      </div>
<!--/.container-->
</body>
</html>