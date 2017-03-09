package alexandrenormand.todolist;

import android.provider.BaseColumns;

/**
 * Created by Alexandre on 05/10/2016.
 */

public class TaskContract {
    public static final String DB_NAME = "alexandrenormand.todolist.db";
    public static final int DB_VERSION = 1;

    public class TaskEntry implements BaseColumns {
        public static final String TABLE = "task";
        public static final String COL_TASK_TITLE = "title";
    }
}
