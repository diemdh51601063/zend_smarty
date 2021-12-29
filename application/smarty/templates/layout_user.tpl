<html>
<body>

<h1>LAYOUT USER</h1>
<p>My first paragraph.</p>
<div id="header">
  {include file="header_user.tpl"}
</div>
{$this->layout()->content}

<div id="footer">
  {include file="footer_user.tpl"}
</div>


</body>
</html>