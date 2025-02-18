<form id="form1" name="form1" method="post" action="imall.php?page=addpart"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="2" scope="col">Please enter your particulars as required. </th>
  </tr>
  <tr>
    <th width="13%" scope="row">Name:</th>
    <td width="87%"><label>
      <input name="name" type="text" id="name" size="50" />
    </label></td>
  </tr>
  <tr>
    <th scope="row">Address:</th>
    <td><label>
      <textarea name="address" cols="50" rows="5" id="address"></textarea>
    </label></td>
  </tr>
  <tr>
    <th scope="row">Contact Number: </th>
    <td><label>
      <input name="contact" type="text" id="contact" size="50" maxlength="8" />
    </label></td>
  </tr>
  <tr>
    <th scope="row">Email Address: </th>
    <td><input name="email" type="text" id="email" value="@" size="50" /></td>
  </tr>
  <tr>
    <th scope="row">Cart ID: </th>
    <td><input name="cartid" type="text"  id="cartid" value="<?php print"$cart_id"; ?>" size="50"disabled/></td>
  </tr>
  <tr>
    <th scope="row"></th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><input type="submit" name="Submit" value="Submit" />
      <input name="Reset" type="reset" id="Reset" value="Reset" /></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<p>&nbsp;</p>
