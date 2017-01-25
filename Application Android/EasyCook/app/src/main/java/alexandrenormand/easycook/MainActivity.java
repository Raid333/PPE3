package alexandrenormand.easycook;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Définition bouton "Ajouter une recette"
        Button btn_add = (Button) findViewById(R.id.btn_add);
        btn_add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent AddRecette = new Intent(MainActivity.this, AddActivity.class);
                Log.i("Easy_Cook", "Oe oe ca fonctionne");
                startActivity(AddRecette);
            }
    });
        // Définition bouton "Liste Entrée"
        Button btn_entree = (Button) findViewById(R.id.btn_entree);
        btn_entree.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent ListeEntree = new Intent (MainActivity.this, ListeEntree.class);
                startActivity(ListeEntree);
            }
        });
        // Définition bouton "Liste Plat"
        Button btn_plat = (Button) findViewById(R.id.btn_plat);
        btn_plat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent ListePlat = new Intent (MainActivity.this, ListePlat.class);
                startActivity(ListePlat);
            }
        });
        // Définition bouton "Liste Dessert"
        Button btn_dessert = (Button) findViewById(R.id.btn_dessert);
        btn_dessert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent ListeDessert = new Intent (MainActivity.this, ListeDessert.class);
                startActivity(ListeDessert);
            }
        });

}}
