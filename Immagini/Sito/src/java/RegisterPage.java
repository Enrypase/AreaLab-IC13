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
@WebServlet(urlPatterns = {"/RegisterPage"})
public class RegisterPage extends HttpServlet {

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

                PreparedStatement ps = null;

                String query = "INSERT INTO users VALUES(?, ?)";
                ps = (PreparedStatement) conn.prepareStatement(query);
                ps.setString(1, username);
                ps.setString(2, password);

                ps.execute();

                File f = new File("/home/enrypase/NetBeansProjects/Sito/web/index.html");
                writeResponse(f, response);
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