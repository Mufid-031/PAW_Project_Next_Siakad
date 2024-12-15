public function showScholarships()
{
    // Fetch scholarships data from the database or an API
    $scholarships = [
        'data' => [
            [
                'nama' => 'Beasiswa A',
                'deskripsi' => 'Deskripsi Beasiswa A',
                'mulai' => '2023-01-01',
                'akhir' => '2023-12-31',
                'link' => 'https://example.com/beasiswa-a'
            ],
            // ... other scholarships ...
        ]
    ];

    // Pass the scholarships data to the view
    return view('student.student-beasiswa', compact('scholarships'));
}
