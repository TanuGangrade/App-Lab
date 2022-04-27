package com.example.lab7

import android.os.Bundle
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class CheckOut : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_check_out)

        var tprice: Int=intent.getIntExtra("Total Price",0)

        val pricedis = findViewById<TextView>(R.id.pricedisplay)

        pricedis.text= tprice.toString()

        Toast.makeText(this@CheckOut, "Total Price is: ${tprice}", Toast.LENGTH_SHORT).show()

    }
}


