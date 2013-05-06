<?php

class Recurly_NoteListTest extends UnitTestCase
{
  public function testGetNotes()
  {
    $this->client = new MockRecurly_Client();
    mockRequest($this->client, 'notes/index-200.xml', array('GET', '/accounts/abcdef1234567890/notes'));

    $notes = Recurly_NoteList::get('abcdef1234567890', $this->client);
    $this->assertIsA($notes, 'Recurly_NoteList');
    $this->assertEqual($notes->count(), 2);

    $note = $notes->current();
    $this->assertIsA($note, 'Recurly_Note');
    $this->assertEqual($note->message, 'this account needs an account manager');
    $this->assertEqual($note->created_at->format(DateTime::ISO8601), '2013-03-12T18:35:00+0000');

    $notes->next();

    $note = $notes->current();
    $this->assertIsA($note, 'Recurly_Note');
    $this->assertEqual($note->message, 'Some message');
    $this->assertEqual($note->created_at->format(DateTime::ISO8601), '2012-04-30T12:35:00+0000');
  }
}
