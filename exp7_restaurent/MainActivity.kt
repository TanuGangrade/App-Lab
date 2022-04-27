package com.example.lab7

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val btn_login = findViewById(R.id.loginbutton) as Button
        val username = findViewById(R.id.editTextTextEmailAddress) as EditText
        val pass = findViewById(R.id.editTextTextPassword) as EditText
        btn_login.setOnClickListener {
            // your code to perform when the user clicks on the button
            if(username.text.isNullOrBlank()&&pass.text.isNullOrBlank()){
                Toast.makeText(this@MainActivity, "Please fill username and password.", Toast.LENGTH_SHORT).show()
            }

            else{
                Toast.makeText(this@MainActivity, "${username.text} is logged in", Toast.LENGTH_SHORT).show()
                val intent = Intent(this, MenuPage::class.java)
                startActivity(intent)

            }

        }
    }
}