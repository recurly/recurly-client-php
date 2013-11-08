<?php

require_once(__DIR__ . '/../test_helpers.php');

class Recurly_NoteListTest extends Recurly_TestCase
{
  public function testGetNotes() {
    $this->client->addResponse('GET', '/accounts/abcdef1234567890/notes', 'notes/index-200.xml');

    $notes = Recurly_NoteList::get('abcdef1234567890', $this->client);
    $this->assertInstanceOf('Recurly_NoteList', $notes);
    $this->assertEquals($notes->count(), 2);

    $note = $notes->current();

    $this->assertInstanceOf('Recurly_Note', $note);
    $this->assertEquals($note->message, 'this account needs an account manager');
    $this->assertEquals($note->created_at->format(DateTime::ISO8601), '2013-03-12T18:35:00+0000');

    $notes->next();

    $note = $notes->current();
    $this->assertInstanceOf('Recurly_Note', $note);
    $this->assertEquals($note->message, 'Some message');
    $this->assertEquals($note->created_at->format(DateTime::ISO8601), '2012-04-30T12:35:00+0000');
  }
}
