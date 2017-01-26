package alexandrenormand.easycook;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class ListeDessert extends AppCompatActivity {

    ListView ListeDessert;
    String[] dessert = new String[]{
            "Tomate", "Sauce Algérienne", "patate", "sucre", "tkt meme pas", "je sais pas",
            "og kush", "ok mon gars", "Ingrid", "Jonathan", "Kevin",
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_liste_dessert);
        setTitle("Easy Cook - Liste Dessert");

        //Définition de la liste des entrée
        ListeDessert = (ListView) findViewById(R.id.ListeDessert);

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(ListeDessert.this,
                android.R.layout.simple_list_item_1, dessert);
        ListeDessert.setAdapter(adapter);
    }
}
