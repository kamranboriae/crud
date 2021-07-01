package com.company;

import java.sql.*;

public class CreateDB {
    public static void main( String args[] ) {

        Connection conn = null;

        try {
            Class.forName("org.sqlite.JDBC");
            conn = DriverManager.getConnection("jdbc:sqlite:D://programers/project java/intellij/java db SQLITE/db/dbtest.db");
        } catch ( Exception e ) {
            System.err.println( e.getClass().getName() + ": " + e.getMessage() );
            System.exit(0);
        }
        System.out.println("Opened database successfully");
    }
}
