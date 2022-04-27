<%@ page import="java.sql.*"%>
<%@ page import="java.util.*"%>
<%!
    Connection con;
    PreparedStatement ps1, ps2;
    public void jspInit()
    {
        try
        {
            Class.forName("com.mysql.jdbc.Driver").newInstance();
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/mydb","root","tanu1234");
            ps1 = con.prepareStatement("select count(*) from USERS where username = ? and password=? and isteacher=?");
            ps2 = con.prepareStatement("select * from USERS");
        }
        catch(Exception ex)
        {
            ex.printStackTrace();
        }
    }
%>
<%
    String param = request.getParameter("s1");
    if(param =="link")
    {
        ResultSet rs = ps2.executeQuery();
        out.println("<table>");
        while(rs.next())
        {
            out.println("<tr>");
            out.println("<td>"+rs.getString(1)+"</td>");
            out.println("<td>"+rs.getString(2)+"</td>");
            out.println("<td>"+rs.getString(3)+"</td>");
            out.println("</tr>");
        }
        out.println("</table>");
        rs.close();
    }
    else
    {
        String user = request.getParameter("uname");
        String pass = request.getParameter("pass");
        String isteacher = request.getParameter("isteacher");
	
        switch(isteacher){
        case "0": {
        ps1.setString(1,user);
        ps1.setString(2,pass);
        ps1.setString(3,"0");

        ResultSet rs = ps1.executeQuery();
        int cnt = 0;
        if (rs.next())
            cnt = rs.getInt(1);
        if(cnt == 0){
            out.println("<form style=text-align:center><fieldset style= width:50%;height:20%;margin-left:25%; >");
            out.println("<b><i text-align: center;><font color=red>Invalid credential</font></i></b><br>");
            out.println("<b><a href=index.html><font size=6 color=red>Try again</font></a></b>");
            out.println("</fieldset></form>");
            
        }   
        else
        {
            out.println("<form style=text-align:center><fieldset style= width:50%;height:20%;margin-left:25%; >");
            out.println("<b><i text-align: center;><font color=#006699  >Login successful.</fonr></i></b><br>");
            out.println("<b><i><a href=examclient.html><font size=6 color=#b3e6ff >Start Exam</font></i></a></b>");
            out.println("</fieldset></form>");
        }
        }break;
        case "1": {
        	ps1.setString(1,user);
            ps1.setString(2,pass);
            ps1.setString(3,"1");

            ResultSet rs = ps1.executeQuery();
            int cnt = 0;
            if (rs.next())
                cnt = rs.getInt(1);
            if(cnt == 0){
                out.println("<form style=text-align:center><fieldset style= width:50%;height:20%;margin-left:25%; >");
                out.println("<b><i text-align: center;><font color=red>Invalid Teacher credential</font></i></b><br>");
                out.println("<b><a href=index.html><font size=6 color=red>Try again</font></a></b>");
                out.println("</fieldset></form>");
                
            }   
            else
            {
                out.println("<form style=text-align:center name=\"examForm\" method=\"post\" action=\"marklist.jsp\"><fieldset style= width:50%;height:20%;margin-left:25%; >");
                out.println("<b><i text-align: center;><font color=#006699  >Login successful.</fonr></i></b><br><br>");
                out.println("<input type=\"submit\" value=\"Marklist\"/>");
                out.println("</fieldset></form>");
            }
        }
        
        }
    }
    
    
%>
<%!
    public void jspDestroy()
    {
        try
        {
            ps1.close();
            ps2.close();
            con.close();
        }
        catch(Exception ex)
        {
            ex.printStackTrace();
        }
    }
%>
