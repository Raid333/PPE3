package alexandrenormand.easycook;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

/**
 * Created by Alexandre on 30/01/2017.
 */

public class RecetteBDD {

    private static final int VERSION_BDD = 1;
    private static final String NOM_BDD = "easycook.db";

    private static final String TABLE_RECETTES = "table_recettes";
    private static final String COL_ID = "id";
    private static final int NUM_COL_ID = 0;
    private static final String COL_NOM = "nom";
    private static final int NUM_COL_NOM = 1;
    private static final String COL_DESCRI = "descri";
    private static final int NUM_COL_DESCRI = 2;

    private SQLiteDatabase bdd;

    private MaBaseSQLite maBaseSQLite;

    public RecetteBDD(Context context){
        //On crée la BDD et sa table
        maBaseSQLite = new MaBaseSQLite(context, NOM_BDD, null, VERSION_BDD);
    }

    public void open(){
        //on ouvre la BDD en écriture
        bdd = maBaseSQLite.getWritableDatabase();
    }

    public void close(){
        //on ferme l'accès à la BDD
        bdd.close();
    }

    public SQLiteDatabase getBDD(){
        return bdd;
    }

    public long insertRecette(Recette recette){
        //Création d'un ContentValues (fonctionne comme une HashMap)
        ContentValues values = new ContentValues();
        //on lui ajoute une valeur associée à une clé (qui est le nom de la colonne dans laquelle on veut mettre la valeur)
        values.put(COL_NOM, recette.getNom());
        values.put(COL_DESCRI, recette.getDescri());
        //on insère l'objet dans la BDD via le ContentValues
        return bdd.insert(TABLE_RECETTES, null, values);
    }

    public int updateRecette(int id, Recette recette){
        //La mise à jour d'un livre dans la BDD fonctionne plus ou moins comme une insertion
        //il faut simplement préciser quelle recette on doit mettre à jour grâce à l'ID
        ContentValues values = new ContentValues();
        values.put(COL_NOM, recette.getNom());
        values.put(COL_DESCRI, recette.getDescri());
        return bdd.update(TABLE_RECETTES, values, COL_ID + " = " +id, null);
    }

    public int removeRecetteWithID(int id){
        //Suppression d'une recette de la BDD grâce à l'ID
        return bdd.delete(TABLE_RECETTES, COL_ID + " = " +id, null);
    }

    public Recette getRecetteWithNom(String nom){
        //Récupère dans un Cursor les valeurs correspondant à une recette contenu dans la BDD (ici on sélectionne la recette grâce à son nom)
        Cursor c = bdd.query(TABLE_RECETTES, new String[] {COL_ID, COL_NOM, COL_NOM}, COL_NOM + " LIKE \"" + nom +"\"", null, null, null, null);
        return cursorToRecette(c);
    }

    //Cette méthode permet de convertir un cursor en une recette
    private Recette cursorToRecette(Cursor c){
        //si aucun élément n'a été retourné dans la requête, on renvoie null
        if (c.getCount() == 0)
            return null;

        //Sinon on se place sur le premier élément
        c.moveToFirst();
        //On créé une recette
        Recette recette = new Recette();
        //on lui affecte toutes les infos grâce aux infos contenues dans le Cursor
        recette.setId(c.getInt(NUM_COL_ID));
        recette.setNom(c.getString(NUM_COL_NOM));
        recette.setDescri(c.getString(NUM_COL_DESCRI));
        //On ferme le cursor
        c.close();

        //On retourne la recette
        return recette;
    }
}
