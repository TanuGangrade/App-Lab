<%@page contentType="text/html"  language="java"  import="java.sql.*"%>
<html>
<head>
 <link rel="stylesheet" href="./style.css">
<title>Online Exam Server</title>

</head>
<body>
<h2 style="text-align:center">ONLINE EXAMINATION MARKLIST</h2>
<p>
<a href="index.html">Back To Main Page</a>
</p>
<hr/>
<%

int mark=0;
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb","root","tanu1234");
Statement stmt=con.createStatement();
ResultSet rs=stmt.executeQuery("SELECT * FROM users");

 out.println("<table>");
 out.println("<th>NAME AND MARKS</th>");
 while(rs.next())
 {
     out.println("<tr>");
     if(rs.getString(3).equals("0")){
     out.println("<td>"+rs.getString(1)+"</td>");
     out.println("<td>"+rs.getString(4)+"</td>");
     }
     out.println("</tr>");
 }
 out.println("</table>");
 rs.close();
 %>
</body>
</html>