package alexandrenormand.easycook;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class ListePlat extends AppCompatActivity {

    ListView ListePlat;
    String[] plat = new String[]{
            "Tomate", "Sauce Algérienne", "patate", "sucre", "tkt meme pas", "je sais pas",
            "og kush", "ok mon gars", "Ingrid", "Jonathan", "Kevin",
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_liste_plat);
        setTitle("Easy Cook - Liste Plat");

        //Définition de la liste des plats
        ListePlat = (ListView) findViewById(R.id.ListePlat);

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(ListePlat.this,
                android.R.layout.simple_list_item_1, plat);
        ListePlat.setAdapter(adapter);
    }
}
