<p>
  {$hello}
  <a href="{$this->url(['controller' => 'index', 'action' => 'view'])}">view</a>
  <a href="{$this->url(['controller' => 'admin', 'action' => 'index'])}">admin</a>
</p>
<h1>LOGIN ADMIN</h1>

<form>
    <label for="fname">Account:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Password:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <input type="submit" value="Submit">
</form>

