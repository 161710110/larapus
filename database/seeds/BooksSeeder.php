<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\User;
use App\BorrowLog;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = Author::create(['name'=>'Lukman']);
        $author2 = Author::create(['name'=>'Salim']);
        $author3 = Author::create(['name'=>'Aam']);
    
    	$book1 = Book::create(['title'=>'Infinity War 2',
    							'amount'=>3, 
    							'authors_id'=>$author1->id]);
    	$book2 = Book::create(['title'=>'Manusia setengah buaya',
								'amount'=>2, 
								'authors_id'=>$author2->id]);

		$book3 = Book::create(['title'=>'Train to busan 2',
								'amount'=>4, 
								'authors_id'=>$author3->id]);
		$book4 = Book::create(['title'=>'Home alone 7',
								'amount'=>3, 
								'authors_id'=>$author3->id]);

        // Sample peminjaman buku
        $member = User::where('email', 'member@gmail.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1]);

    }
}
