<!DOCTYPE html>
<html>

   <head>
      <title>HTML Iframes</title>
   </head>
	
   <body>
  <form action="/uploads" enctype="multipart/form-data" method="POST">
    <input type="file" name="my_file" multiple="multiple" />
  </form>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="//assets.transloadit.com/js/jquery.transloadit2-v3-latest.js"></script>
  <script type="text/javascript">
    $(function () {
      $('form').transloadit({
        wait: true,
        triggerUploadOnFileSelection: true,
        // To avoid tampering, use Signature Authentication:
        // https://transloadit.com/docs/topics/signature-authentication/
        auth: {
          key: '6eab63b5873a4fb28d69964557c17b79',
        },
        template_id: 'fdd9f31874144420a4b81fa974aa1bf6',
        steps: undefined,
      })
    })
  </script>
</body>
	
</html>