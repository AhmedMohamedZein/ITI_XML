<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="2.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/contacts">
  <html>
  <body>
    <h2>contacts</h2>
    <table border="1">
    <tr bgcolor="#9acd32">
      <th align="left">name</th>
      <th align="left">email</th>
      <th align="left">phone</th>
      <th align="left">address</th>
    </tr>
    <xsl:for-each select="employee">
    <tr>
      <td><xsl:value-of select="name"/></td>
      <td><xsl:value-of select="email"/></td>
       <td><xsl:value-of select="phone"/></td> 
      <td><xsl:value-of select="address"/></td>
    </tr>
    </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>

