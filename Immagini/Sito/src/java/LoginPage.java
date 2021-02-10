/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import com.mysql.jdbc.*;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author enrypase
 */
@WebServlet(urlPatterns = {"/LoginPage"})
public class LoginPage extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException, SQLException, ClassNotFoundException {
         
        String username = request.getParameter("user");
        String password = request.getParameter("pass");
        
        if(username.equals("") || password.equals("") || username.length() > 32 || password.length() > 32){
            File f = new File("/home/enrypase/NetBeansProjects/Sito/web/loginError.html");
            writeResponse(f, response);
        }
        else{
            try{
                Class.forName("com.mysql.jdbc.Driver");
                Connection conn = (Connection) DriverManager.getConnection("jdbc:mysql://localhost:3306/sito?user=database&password=1231234");

                if(findUser(username, password, conn)){
                    loginSuccessful(username, response);
                }
                else{
                    loginFailed(username, response);
                }
            }
            catch(SQLException e){
                System.out.println("SQLException");
                System.out.println(e);
            }
        }

    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(LoginPage.class.getName()).log(Level.SEVERE, null, ex);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(LoginPage.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(LoginPage.class.getName()).log(Level.SEVERE, null, ex);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(LoginPage.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

    public boolean findUser(String user, String pass, Connection c) throws SQLException{
        ResultSet rs = null;
        PreparedStatement ps = null;
        
        String query = "SELECT username, passwd FROM users WHERE username=? AND passwd=?";
        ps = (PreparedStatement) c.prepareStatement(query);
        ps.setString(1, user);
        ps.setString(2, pass);
        
        rs = ps.executeQuery();

        ResultSetMetaData md;
        md = (ResultSetMetaData) rs.getMetaData();
        
        while(rs.next()){
            return true;
        }       
        
        return false;
    }
    
    public void loginSuccessful(String user, HttpServletResponse response) throws FileNotFoundException, IOException{
        try{
            PrintWriter pw = response.getWriter();
            pw.println("<!DOCTYPE html>");
            pw.println("<html>");
                pw.println("<head>");
                    pw.println("<title> Home </title>");
                pw.println("</head>");
                pw.println("<body>");
                    pw.println("<h1> Welcome " + user + "! </h1>");
                    pw.println("<p> Glad to have you back :D </p>");
                pw.println("</body>");
            pw.println("</html>");
        }
        catch(Exception e){
            System.out.println("Noo, crasha la pagina del login");
        }
    }
    
    public void loginFailed(String user, HttpServletResponse response) throws FileNotFoundException, IOException{
        File f = new File("/home/enrypase/NetBeansProjects/Sito/web/index.html");
        writeResponse(f, response);
    }
    
    public void writeResponse(File f, HttpServletResponse resp) throws FileNotFoundException, IOException{
        BufferedReader br = new BufferedReader(new FileReader(f));
        
        try{
            PrintWriter out = resp.getWriter();
            String line = null;
            while((line = br.readLine()) != null){
                out.println(line);
            }
            br.close();
        }  
        catch(Exception e){
            System.out.println("Uffi, crasha la copia del file :(");
        }
    }
    
}