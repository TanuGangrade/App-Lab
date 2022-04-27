package com.example.lab7

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class MenuPage : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_menu_page)

        val btn_send = findViewById<Button>(R.id.sendmenu)
        val orderveg = findViewById<Button>(R.id.orderlinkveg)
        val ordernonveg = findViewById<TextView>(R.id.orderlinknonveg)
        val orderlemonjuice = findViewById<TextView>(R.id.orderlinklemonjuice)
        val ordersoup = findViewById<TextView>(R.id.orderlinksoup)
        val orderorangejuice = findViewById<TextView>(R.id.orderlinkorangejuice)
        val ordertikka = findViewById<TextView>(R.id.orderlinktikka)
        val orderkebab = findViewById<TextView>(R.id.orderlinkkebab)
        val orderfrenchfries = findViewById<TextView>(R.id.orderlinkfrenchfries)
        val orderroti = findViewById<TextView>(R.id.orderlinkroti)
        val ordernoodles = findViewById<TextView>(R.id.orderlinknoodles)
        val orderbiryani = findViewById<TextView>(R.id.orderlinkbiryani)
        val ordericecream = findViewById<TextView>(R.id.orderlinkicecream)
        val ordergulabjamun = findViewById<TextView>(R.id.orderlinkgulabjamun)
        val orderkesari = findViewById<TextView>(R.id.orderlinkkesari)

        val vegprice = findViewById<TextView>(R.id.vegprice)
        val nonvegprice = findViewById<TextView>(R.id.nonvegprice)
        val lemonjuiceprice = findViewById<TextView>(R.id.lemonjuiceprice)
        val soupprice = findViewById<TextView>(R.id.soupprice)
        val orangejuiceprice = findViewById<TextView>(R.id.orangejuiceprice)
        val tikkaprice = findViewById<TextView>(R.id.tikkaprice)
        val kebabprice = findViewById<TextView>(R.id.kebabprice)
        val frenchfriesprice = findViewById<TextView>(R.id.frenchfriesprice)
        val rotiprice = findViewById<TextView>(R.id.rotiprice)
        val noodlesprice = findViewById<TextView>(R.id.noodlesprice)
        val biryaniprice = findViewById<TextView>(R.id.biryaniprice)
        val icecreamprice = findViewById<TextView>(R.id.icecreamprice)
        val gulabjamunprice = findViewById<TextView>(R.id.gulabjamunprice)
        val kesariprice = findViewById<TextView>(R.id.kesariprice)


        var totalprice = 0;

        orderveg.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  vegprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordernonveg.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  nonvegprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderlemonjuice.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  lemonjuiceprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordersoup.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  soupprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderorangejuice.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  orangejuiceprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordertikka.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  tikkaprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderkebab.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  kebabprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderfrenchfries.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  frenchfriesprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderroti.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  rotiprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordernoodles.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  noodlesprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderbiryani.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  biryaniprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordericecream.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  icecreamprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        ordergulabjamun.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  gulabjamunprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }
        orderkesari.setOnClickListener {
            // your code to perform when the user clicks on the button
            totalprice+=  kesariprice.text.toString().toInt();
            Toast.makeText(this@MenuPage, "totalPrice:${totalprice}", Toast.LENGTH_SHORT).show()
        }

        btn_send.setOnClickListener {
            // your code to perform when the user clicks on the button
                val intent = Intent(this, CheckOut::class.java)
                intent.putExtra("Total Price", totalprice)
                startActivity(intent)
            }
        }
    }
