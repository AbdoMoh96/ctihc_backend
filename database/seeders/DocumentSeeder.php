<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            // Create the document
            $documentId = DB::table('documents')->insertGetId([
                'document_path' => 'documents/document_' . $i . '.pdf',
                'created_by' => rand(1, 5), // assuming user IDs between 1 and 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create the 'en' (English) language version
            DB::table('documents_lang')->insert([
                'document_id' => $documentId,
                'lang' => 'en',
                'title' => 'Document ' . $i . ' Title (EN)',
                'description' => 'This is the English description for document ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create the 'ar' (Arabic) language version
            DB::table('documents_lang')->insert([
                'document_id' => $documentId,
                'lang' => 'ar',
                'title' => 'عنوان المستند ' . $i . ' (AR)',
                'description' => 'هذا هو الوصف باللغة العربية للمستند ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
