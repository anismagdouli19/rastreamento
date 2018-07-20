<form name="form1" method="post" action="email.php">
  <table width="100" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr bgcolor="#F4F4F4"> 
      <td valign="top" width="100" nowrap><font class="texto">Nome:</font></td>
      <td> 
        <input class="form_campos" type="text" name="nome" size="34">
      </td>
    </tr>
    <tr bgcolor="#EFEFEF"> 
      <td valign="top" width="100" nowrap><font class="texto">Cidade</font></td>
      <td> 
        <input class="form_campos" type="text" name="cidade" size="20">
      </td>
    </tr>
    <tr bgcolor="#F4F4F4"> 
      <td valign="top" width="100" nowrap><font class="texto">Estado:</font></td>
      <td> 
        <input class="form_campos" type="text" name="estado" size="11">
      </td>
    </tr>
    <tr bgcolor="#EFEFEF"> 
      <td valign="top" width="100" nowrap><font class="texto">E-mail:</font></td>
      <td> 
        <input class="form_campos" type="text" name="email" size="34">
      </td>
    </tr>
    <tr bgcolor="#F4F4F4"> 
      <td valign="top" width="100" nowrap><font class="texto">Assunto:</font></td>
      <td> 
        <select class="form_campos" name="assunto">
          <option class="form_campos" value="Opinião" selected>Opinião</option>
          <option class="form_campos" value="Sugestão">Sugestão</option>
          <option class="form_campos" value="Parceria">Parceria</option>
          <option class="form_campos" value="Reclamação">Reclamação</option>
          <option class="form_campos" value="Outros">Outros</option>
        </select>
      </td>
    </tr>
    <tr bgcolor="#EFEFEF"> 
      <td valign="top" width="100" nowrap><font class="texto">Mensagem:</font></td>
      <td> 
        <textarea class="form_campos" name="mensagem" cols="34" rows="4"></textarea>
      </td>
    </tr>
    <tr bgcolor="#F4F4F4"> 
      <td colspan="2" valign="middle"> 
	  	<br>
        <div align="center"> 
          <input class="form_botao" type="submit" name="Enviar" value="Enviar Mensagem">
          <input class="form_botao" type="reset" name="Limpar" value="Limpar">
        </div>
      </td>
    </tr>
  </table>
</form>
