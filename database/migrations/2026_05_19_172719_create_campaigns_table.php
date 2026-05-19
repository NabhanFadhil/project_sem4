public function up(): void
{
    Schema::create('campaigns', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->integer('target_amount');
        $table->timestamps();
    });
}