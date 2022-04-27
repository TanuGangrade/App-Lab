<%@page contentType="text/html"  language="java"  import="java.sql.*"%>
<html>
<head>
 <link rel="stylesheet" href="./style.css">
<title>Online Exam Server</title>

</head>
<body>
<h2 style="text-align:center">ONLINE EXAMINATION</h2>
<p>
<a href="index.html">Back To Main Page</a>
</p>
<hr/>
<%
String str1=request.getParameter("ans1");
String str2=request.getParameter("ans2");
String str3=request.getParameter("ans3");
String str4=request.getParameter("name");

int mark=0;
Class.forName("com.mysql.jdbc.Driver").newInstance();
Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb","root","tanu1234");
Statement stmt=con.createStatement();
ResultSet rs=stmt.executeQuery("SELECT * FROM examTab");
//PreparedStatement ps1;
//ps1 = con.prepareStatement("UPDATE USERS SET marks="+mark+" where username="+str4);
while(rs.next())
{
 String dbans1=rs.getString(1);
 String dbans2=rs.getString(2);
 String dbans3=rs.getString(3);
 if(str1.equals(dbans1))
 {
 mark=mark+5;
 }
 if(str2.equals(dbans2))
 {
 mark=mark+5;
 }
 if(str3.equals(dbans3))
 {
 mark=mark+5;
 }
}

if(mark>=10)
{
 out.println("<h4>Your Score Is : "+mark+"</h4>");
 
 out.println("<h3>Congratulations "+str4+"! You Are Eligible For The Next Round!</h3>");
}
else
{
 out.println("<h4>Your Score is : "+mark+"</h4>");
 out.println("<h3>Sorry!You Are Not Eligible For The Next Round.</h3>");
}
    <!-- isu -->
     PreparedStatement st = con.prepareStatement("UPDATE USERS SET marks=? where username=\"?\"");
    String marks=String.valueOf(mark);
    st.setString(1, marks);
    st.setString(2, str4);
    
    st.executeUpdate(); 


%>

</body>
</html>